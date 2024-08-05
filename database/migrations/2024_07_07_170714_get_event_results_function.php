<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement(

            "
            -- Create or replace function definition
CREATE OR REPLACE FUNCTION get_event_results()
RETURNS TABLE (
    competitor_position integer,
    competitor_start_number integer,
    first_name varchar(50),
    last_name varchar(50),
    class_name varchar(50),
    team_name varchar(50),
    comp_1 integer,
    comp_2 integer,
    comp_3 integer,
    total_points integer,
    concatenated_list_of_points jsonb
) AS $$
BEGIN
    -- Your query
    RETURN QUERY
  select 
cast(row_number() over (order by sum(subquery.points) desc) as integer) as competitor_position,
subquery.competitor_start_number, subquery.first_name, 
subquery.last_name, subquery.class_name, subquery.team_name,
max(Case when rn=1 then subquery.points end ) as comp_1,
max(Case when rn=2 then subquery.points end ) as comp_2,
max(Case when rn=3 then subquery.points end ) as comp_3,
cast(sum(subquery.points) as integer) as total_points,
JSONB_AGG(subquery.list_of_points) as concatenated_list_of_points
from (
	select event_competitor_start_number.competitor_start_number, competitors.first_name, 
competitors.last_name, competitor_classes.class_name, teams.team_name, competitions.competition_name, competitions.competition_max_points, 
event_competitor_competition.points,  event_competitor_competition.list_of_points,
ROW_NUMBER() over 
(partition by event_competitor_competition.competitor_id order by event_competitor_competition.competition_id) 
as rn
from event_competitor_competition
join competitors on event_competitor_competition.competitor_id = competitors.competitor_id
join competitions on event_competitor_competition.competition_id = competitions.competition_id
join event_competitor_start_number 
on event_competitor_competition.competitor_id = event_competitor_start_number.competitor_id 
and event_competitor_competition.event_id = event_competitor_start_number.event_id
join event_competitor_class 
on event_competitor_competition.competitor_id = event_competitor_class.competitor_id 
and event_competitor_competition.event_id = event_competitor_class.event_id
join competitor_classes on event_competitor_class.class_id = competitor_classes.class_id
join event_competitor_team on  
event_competitor_competition.competitor_id = event_competitor_team.competitor_id
and event_competitor_competition.event_id = event_competitor_team.event_id
join teams on event_competitor_team.team_id = teams.team_id)
as subquery 
group by  subquery.competitor_start_number, subquery.first_name, 
subquery.last_name, subquery.class_name, subquery.team_name
order by total_points desc;
END;
$$ LANGUAGE plpgsql;
"
);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement(
            "
            DROP FUNCTION IF EXISTS get_event_results();
            "
        );
    }
};
