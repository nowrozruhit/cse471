
let id = $("input[name*='id']")
id.attr("readonly","readonly");


$(".btnedit").click( e =>{
    let textvalues = displayData(e);

    ;
    let username = $("input[name*='username']");
    let password = $("input[name*='password']");
    let type = $("input[name*='type']");
    let employee_since = $("input[name*='employee_since']");

    id.val(textvalues[0]);
    username.val(textvalues[1]);
    password.val(textvalues[2]);
    type.val(textvalues[3]);
    employee_since.val(textvalues[4]);
    

});


function displayData(e) {
    let id = 0;
    const td = $("#tbody tr td");
    let textvalues = [];

    for (const value of td){
        if(value.dataset.id == e.target.dataset.id){
           textvalues[id++] = value.textContent;
        }
    }
    return textvalues;

}