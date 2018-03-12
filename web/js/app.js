function msg() {
    alert("Hello Javatpoint");
}

function editProject(id) {
    $("div[data-id_project='" + id + "']").toggle();
}

function saveProject(id) {
    var form = $("#form_edit_project_" + id);

    var name = $(form).find("input[name='name']").val();

    if (name !== '') {
        $.ajax({
            url: window.location.pathname + '/../project/edit',
            cache: false,
            data: {
                id: id,
                name: name
            },
            async: true,
            type: 'post',
            success: function () {
                $("span[data-id_project='" + id + "']").html("<b>" + name + "</b>");

            },
            error: function () {
                console.log("failure");
            }
        });
    }

    $("div[data-id_project='" + id + "']").hide();
}

function createTask(id_project) {
    var form = $("#form_add_task_" + id_project);

    var description = $(form).find("input[name='task_description']").val();

    if (description !== '') {
        $.ajax({
            url: window.location.pathname + '/../project/addtask',
            cache: false,
            data: {
                id_project: id_project,
                description: description
            },
            async: true,
            type: 'post',
            success: function (result) {
                $("div[data-id='todo_tasks_" + id_project + "']").append(result);
            },
            error: function () {
                console.log("failure");
            }
        });

        $(form).find("input[name='task_description']").val('');
    }
}

function completeTask(id_task, id_project) {
    $.ajax({
        url: window.location.pathname + '/../project/completetask',
        cache: false,
        data: {
            id: id_task
        },
        async: true,
        type: 'post',
        success: function (result) {
            $("div[data-id='task_" + id_task + "']").remove();
            $("div[data-id='done_tasks_" + id_project + "']").append(result);
        },
        error: function () {
            console.log("failure");
        }
    });
}

function deleteTask(id) {

    $.ajax({
        url: window.location.pathname + '/../project/deletetask',
        cache: false,
        data: {
            id: id
        },
        async: true,
        type: 'post',
        success: function () {
            $("div[data-id='task_" + id + "']").remove();
        },
        error: function () {
            console.log("failure");
        }
    });
}