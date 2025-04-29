function sortTable(columnIndex, type, direction) {
    const table = document.getElementById("feedbackTable");
    const rows = Array.from(table.rows).slice(1); // Exclude header row
    const isAscending = direction === "asc" ? 1 : -1; // Determine sort direction

    rows.sort((a, b) => {
        const aText = a.cells[columnIndex].innerText.trim();
        const bText = b.cells[columnIndex].innerText.trim();

        if (type === "number") {
            return (parseFloat(aText) - parseFloat(bText)) * isAscending;
        } else if (type === "date") {
            return (new Date(aText) - new Date(bText)) * isAscending;
        } else {
            return aText.localeCompare(bText) * isAscending;
        }
    });

    rows.forEach(row => table.tBodies[0].appendChild(row));
}
