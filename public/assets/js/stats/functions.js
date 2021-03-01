function new_chart(id, type, data, options) {
    new Chart(id, {
        type: type,
        data: data,
        options: options
    });
}


function fill_background_hover_color(data_length) {
    var backgroundColor      = [];
    var hoverBackgroundColor = [];

    for(i=0; i<=data_length-1; i++) {
        backgroundColor.push(random_rgb_color());              // Light color
        hoverBackgroundColor.push("rgb(46, 52, 54)"); // Dark color
    }

    return [backgroundColor, hoverBackgroundColor];
}
