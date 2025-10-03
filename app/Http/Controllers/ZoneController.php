<?php
namespace App\Http\Controllers;

use App\Models\Zone;
use Grimzy\LaravelMysqlSpatial\Types\Polygon;
use Grimzy\LaravelMysqlSpatial\Types\LineString;
use Grimzy\LaravelMysqlSpatial\Types\Point;
use Illuminate\Http\Request;

class ZoneController extends Controller
{
    public function index()
    {
        $zones = Zone::all();
        return view('zones.index', compact('zones'));
    }

    public function create()
    {
        return view('zones.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'status' => 'required|in:0,1',
            'coordinates' => 'required',
        ]);

        $polygon = $this->parseCoordinates($request->input('coordinates'));
        $zone = new Zone();
        $zone->title = $request->input('title');
        $zone->status = $request->input('status');
        $zone->coordinates = $polygon;
        $zone->alias = $request->input('coordinates');
        $zone->save();

        return redirect()->route('zones.index')->with('success', 'Zone created successfully.');
    }

    public function edit(Zone $zone)
    {
        return view('zones.edit', compact('zone'));
    }

    public function update(Request $request, Zone $zone)
    {
        $request->validate([
            'title' => 'required',
            'status' => 'required|in:0,1',
            'coordinates' => 'required',
        ]);

        $polygon = $this->parseCoordinates($request->input('coordinates'));
        $zone->title = $request->input('title');
        $zone->status = $request->input('status');
        $zone->coordinates = $polygon;
        $zone->alias = $request->input('coordinates');
        $zone->save();

        return redirect()->route('zones.index')->with('success', 'Zone updated successfully.');
    }

    public function destroy(Zone $zone)
    {
        $zone->delete();
        return redirect()->route('zones.index')->with('success', 'Zone deleted successfully.');
    }

    private function parseCoordinates($coordinates)
    {
        $polygonPoints = [];
        foreach (explode('),(', trim($coordinates, '()')) as $index => $singleArray) {
            if ($index == 0) {
                $lastcord = explode(',', $singleArray);
            }
            $coords = explode(',', $singleArray);
            $polygonPoints[] = new Point($coords[0], $coords[1]);
        }
        $polygonPoints[] = new Point($lastcord[0], $lastcord[1]);
        return new Polygon([new LineString($polygonPoints)]);
    }
}

