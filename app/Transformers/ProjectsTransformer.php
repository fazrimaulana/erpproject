<?php

namespace App\Transformers;

use App\Projects;
use League\Fractal\TransformerAbstract;

/**
* 
*/
class ProjectsTransformer extends TransformerAbstract
{
	
	public function transform(Projects $project){
		return [
			'client'		=> $project->client->company_name,
			'name'			=> $project->name,
			'description'	=> $project->description,
			'assign_to'		=> $project->user->name,
			'start_at'		=> $project->start_at,
			'end_at'		=> $project->end_at,
		];
	}

}