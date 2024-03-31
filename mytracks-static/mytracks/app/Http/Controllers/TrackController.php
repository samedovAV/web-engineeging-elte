<?php

namespace App\Http\Controllers;

use App\Filter;
use App\Project;
use App\Track;
use Illuminate\Http\Request;

class TrackController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Project $project)
    {
        $this->authorize('access', $project);
        $filters = Filter::all();
        return view('tracks.create', [
            'id'        => $project['id'],
            'filters'   => $filters,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Project $project, Request $request)
    {
        $this->authorize('access', $project);
        $data = $request->validate([
            'name'      => 'required',
            'file'      => 'nullable|file|mime-types:audio/mpeg',
            'color'     => 'required|regex:/^#[0-9a-z]{6}$/',
            'filters'   => 'nullable|array',
        ]);
        if (isset($data['file'])) {
            $filename = $request->file('file')->store('public/audio-files');
            $data['filename'] = $filename;
        }
        $track = $project->tracks()->create($data);
        if (isset($data['filters'])) {
            $track->filters()->attach($data['filters']);
        }
        return redirect()->route('projects.show', ['project' => $project['id']]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Track  $track
     * @return \Illuminate\Http\Response
     */
    public function edit(Track $track)
    {
        $this->authorize('access', $track);
        $filters = Filter::all();
        $track->load('filters');
        return view('tracks.edit', compact('track', 'filters'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Track  $track
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Track $track)
    {
        $this->authorize('access', $track);
        $data = $request->validate([
            'name'      => 'required',
            'file'      => 'nullable|file|mime-types:audio/mpeg',
            'color'     => 'required|regex:/^#[0-9a-z]{6}$/',
            'filters'   => 'nullable|array',
        ]);
        if (isset($data['file'])) {
            $filename = $request->file('file')->store('public/audio-files');
            $data['filename'] = $filename;
        }
        $track->update($data);
        $track->filters()->sync($data['filters'] ?? []);
        return redirect()->route('projects.show', ['project' => $track->project['id']]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Track  $track
     * @return \Illuminate\Http\Response
     */
    public function destroy(Track $track)
    {
        $this->authorize('access', $track);
        $track->delete();
        return redirect()->route('projects.show', ['project' => $track->project['id']]);
    }
}
