const resetQuoteListForm = () => {
    const selectMenuOptions = document.querySelectorAll("#make_selection select option");
    selectMenuOptions.forEach(option => {
        if (option.text == "View All Categories" || 
            option.text == "View All Authors") {
                option.selected = true;
                option.defaultSelected = true;
        } else {
            option.selected = false;
            option.defaultSelected = false;
        }
    });
    document.getElementById("sortByPrice").checked = true;
    document.getElementById("sortByPrice").defaultChecked = true;
    document.getElementById("sortByYear").checked = false;
    document.getElementById("sortByYear").defaultChecked = false;
}
const init = () => {
    document.getElementById("resetQuoteListForm").addEventListener("click", resetQuoteListForm);
}
init();


