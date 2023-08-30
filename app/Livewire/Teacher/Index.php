<?php

namespace App\Livewire\Teacher;

use App\Models\Teacher;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    public function render()
    {
        $perPage = 4;
        $teachers = Teacher::where('status', 'Publish')->get();

        $paginatedTeachers = collect($teachers)->chunk($perPage);

        $page = request()->get('page', 1);
        $currentPageTeachers = $paginatedTeachers[$page - 1] ?? collect();

        $teachersArray = [];
        foreach ($currentPageTeachers as $teacher) {
            $teachersArray[] = [
                'teacher_subjects' => $teacher->teacher_subjects,
                'teacher_name' => $teacher->teacher_name,
                'teacher_photo_base_64' => lazyImage(public_path("images_upload/" . $teacher->teacher_photo), $teacher->teacher_name, 400, 400),
                'teacher_photo' => "images_upload/" . $teacher->teacher_photo,
            ];
        }

        $paginator = new \Illuminate\Pagination\LengthAwarePaginator(
            $teachersArray,
            count($teachers),
            $perPage,
            $page
        );
        return view('livewire.teacher.index',[
            'teachersArray' => $teachersArray, 
            'paginator' => $paginator
        ]);
    }
}
