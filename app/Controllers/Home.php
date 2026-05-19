<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data = [
            'judul' => 'dashboard',
            'page' => 'template/v_dashboard',
            
        ];
        return view('v_template', $data);
    }

    public function baseMaps()
    {
        $data = [
            'judul' => 'Base Maps',
            'page' => 'template/basemap/v_basemap',
            
        ];
        return view('v_template', $data);
    }

    public function viewMap()
    {
        $data = [
            'judul' => 'View Map',
            'page' => 'template/viewmap/v_viewmap',
            
        ];
        return view('v_template', $data);
    }
    public function marker()
    {
        $data = [
            'judul' => 'Marker',
            'page' => 'template/marker/v_marker',
            
        ];
        return view('v_template', $data);
    }

        public function circle()
    {
        $data = [
            'judul' => 'circle',
            'page' => 'template/circle/v_circle',
            
        ];
        return view('v_template', $data);
    }

        public function polyline()
    {
        $data = [
            'judul' => 'polyline',
            'page' => 'template/poly/v_polyline',
            
        ];
        return view('v_template', $data);
    }

        public function polygon()
    {
        $data = [
            'judul' => 'polygon',
            'page' => 'template/poly/v_polygon',
            
        ];
        return view('v_template', $data);
    }

        public function geojson()
    {
        $data = [
            'judul' => 'geojson',
            'page' => 'template/geojson/v_geojson',
            
        ];
        return view('v_template', $data);
    }
        public function geojson2()
    {
        $data = [
            'judul' => 'geojson2',
            'page' => 'template/geojson/v_geojson2',
            
        ];
        return view('v_template', $data);
    }

        public function getcoordinat2()
    {
        $data = [
            'judul' => 'getcoordinat2',
            'page' => 'template/getcoordinat/v_getcoordinat2',
            
        ];
        return view('v_template', $data);
    }

        public function getcoordinat()
    {
        $data = [
            'judul' => 'getcoordinat',
            'page' => 'template/getcoordinat/v_getcoordinat',
            
        ];
        return view('v_template', $data);
    }
}
