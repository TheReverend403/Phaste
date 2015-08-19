(function() {
    // Get the only pre tag on the page
    var pre = document.getElementsByTagName('pre')[0];
    
    // Create span element, which will be our line numbers
    var span = document.createElement('span');
    span.className = "line-number";
    
    // Get number of lines in paste
    var numberOfLines = pre.innerHTML.split(/\n/).length;
    
    // Iterate each line
    for (i = 0, j = 1; i < numberOfLines; i++, j++)
    {
        // Create a new child span, set its attributes accordingly
        var lineSpan = document.createElement("span");
        lineSpan.id = 'L' + j;
        lineSpan.setAttribute("onClick", "document.location.hash = this.id")
        lineSpan.innerHTML = j;
        
        // Add to line-numbers span
        span.appendChild(lineSpan);
    }
    
    // Insert before the rest of the code
    pre.insertBefore(span, pre.firstChild);

    cl = document.createElement("span");
    cl.className = "cl";
    pre.appendChild(cl);
})();
