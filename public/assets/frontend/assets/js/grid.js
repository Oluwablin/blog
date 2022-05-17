var elements = document.getElementsByClassName("columns")

var i;

// list view
function listView(){
    for(i = 0; i < elements.length; i++){
        elements[i].style.width="100%"
    }
    console.log({listView})

}
function gridView(){
    for(i = 0; i <elements.length; i++ ){
        elements[i].style.width = "50%";
        elemetns[i].style.flexDirection = "row" 
        elements[i].style.display="flex!important"
        this.className += " grids";

    }
    // console.log({gridView})
}