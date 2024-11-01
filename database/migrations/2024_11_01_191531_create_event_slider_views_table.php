<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
        CREATE OR REPLACE VIEW event_slider_view AS
        SELECT 
            ep.title AS title,
            ep.photo_path AS photo_path,
            'event' AS type,
            e.slug AS slug,
            ep.updated_at AS updated_at
        FROM 
            event_photos ep
        JOIN 
            events e ON e.id = ep.event_id
        WHERE 
            ep.display_on_slider = 1
        
        UNION ALL
        
        SELECT 
            s.title AS title,
            s.photo_path AS photo_path,
            'slider' AS type,
            NULL AS slug,
            s.updated_at AS updated_at
        FROM 
            sliders s
        WHERE 
            s.status = 1;
    ");
    }

    public function down()
    {
        DB::statement("DROP VIEW IF EXISTS event_slider_view");
    }
};
