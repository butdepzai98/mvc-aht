<?php
namespace AHT\Controllers;

use AHT\Core\Controller;
use AHT\Models\Task;

class tasksController extends Controller
{
    function index()
    {
        $d["tasks"] = Task::all()->toArray();

        $this->set($d);
        $this->render("index");
    }

    function create()
    {
        if (isset($_POST["title"]))
        {
            $task = new Task();
            $task->title = $_POST["title"];
            $task->description = $_POST["description"];

            if ($task->save())
            {
                header("Location: " . WEBROOT . "tasks/index");
            }
        }
        $this->render("create");
    }

    function edit($id)
    {
        $d['task'] = Task::find($id)->toArray();

        if (isset($_POST["title"]))
        {
            $task = Task::find($id);
            $task->title = $_POST["title"];
            $task->description = $_POST["description"];

            if ($task->save())
            {
                header("Location: " . WEBROOT . "tasks/index");
            }
        }
        $this->set($d);
        $this->render("edit");
    }

    function delete($id)
    {
        $task = Task::find($id);
        if ($task->delete())
        {
            header("Location: " . WEBROOT . "tasks/index");
        }
    }
}
?>