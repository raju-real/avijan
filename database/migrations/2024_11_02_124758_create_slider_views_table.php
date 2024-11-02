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
        CREATE OR REPLACE VIEW slider_views AS
        SELECT 
            ep.title AS title,
            ep.photo_path AS photo_path,
            'event' AS type,
            e.slug AS slug,
            ep.updated_at AS updated_at,
            ROW_NUMBER() OVER (ORDER BY ep.updated_at) AS sorting_serial
        FROM 
            event_photos ep
        JOIN 
            events e ON e.id = ep.event_id
        WHERE 
            ep.display_on_slider = 1

        UNION ALL

        SELECT 
            g.title AS title,
            g.photo_path AS photo_path,
            'gallery' AS type,
            NULL AS slug,
            g.updated_at AS updated_at,
            ROW_NUMBER() OVER (ORDER BY g.updated_at) + (
                SELECT COUNT(*) FROM event_photos WHERE display_on_slider = 1
            ) AS sorting_serial
        FROM 
            galleries g
        WHERE 
            g.display_on_slider = 1;
    ");
    }

    public function down()
    {
        DB::statement("DROP VIEW IF EXISTS slider_views");
    }
};
