<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data = [
            'judul' => 'dashboard',
            'page' => 'v_dashboard',
            
        ];
        return view('v_template', $data);
    }

    public function baseMaps()
    {
        $data = [
            'judul' => 'Base Maps',
            'page' => 'v_basemap',
            
        ];
        return view('v_template', $data);
    }

    public function viewMap()
    {
        $data = [
            'judul' => 'View Map',
            'page' => 'v_viewmap',
            
        ];
        return view('v_template', $data);
    }
    public function marker()
    {
        $data = [
            'judul' => 'Marker',
            'page' => 'v_marker',
            
        ];
        return view('v_template', $data);
    }

        public function circle()
    {
        $data = [
            'judul' => 'circle',
            'page' => 'v_circle',
            
        ];
        return view('v_template', $data);
    }

        public function polyline()
    {
        $data = [
            'judul' => 'polyline',
            'page' => 'v_polyline',
            
        ];
        return view('v_template', $data);
    }

        public function polygon()
    {
        $data = [
            'judul' => 'polygon',
            'page' => 'v_polygon',
            
        ];
        return view('v_template', $data);
    }

        public function geojson()
    {
        $data = [
            'judul' => 'geojson',
            'page' => 'v_geojson',
            
        ];
        return view('v_template', $data);
    }

        public function getcoordinat2()
    {
        $data = [
            'judul' => 'getcoordinat2',
            'page' => 'v_getcoordinat2',
            
        ];
        return view('v_template', $data);
    }

        public function getcoordinat()
    {
        $data = [
            'judul' => 'getcoordinat',
            'page' => 'v_getcoordinat',
            
        ];
        return view('v_template', $data);
    }
}
