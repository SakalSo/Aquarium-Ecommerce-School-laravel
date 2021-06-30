(function addDropDownToSideBar() {
    function toggleShow(id) {
        return function(e) {
            $(`#${id}`).toggleClass("show");
        };
    }
    $("#pos-dropdown-toggler").click(toggleShow("pos-dropdown"));
    $("#web-pages-dropdown-toggler").click(toggleShow("web-pages-dropdown"));
})();
