

function prompt_task()
{
    console.log("Clicked the button...");
    var text = prompt("Fill in a new TO DO in your list: ", "");
    if (text)
        add_task(text);
    else
    console.log("Canceled...");

    function add_task(text) {
        var new_elem = document.createElement("Li");
        // new_elem.id = new_elem_id;
        new_elem.appendChild(document.createTextNode(text));
        var list = document.getElementById("ft_list");
        list.insertBefore(new_elem, list.childNodes[0]);

        new_elem.addEventListener('click', function (event) {
            var q = confirm("Are you shure?");
            if (q)
                event.target.remove();
        })
    }
}
