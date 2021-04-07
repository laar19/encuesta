// Get random color
function random_rgb_color() {
    random_color = function() {
        return Math.round(Math.random() * 255);
    }
    
    var r = random_color();
    //var dark_r = r * (1/4);

    var g = random_color();
    //var dark_g = g * (1/2);

    var b = random_color();
    //var dark_b = b * (3/4);

    var rgb = "rgb(" + r + "," + g + "," + b + ")";
    //var dark_rgb = "rgb(" + dark_r + "," + dark_g + "," + dark_b + ")";

    //return [rgb, dark_rgb];
    return rgb;
}

function new_chart(id, type, data, options) {
    new Chart(id,
        {
            type: type,
            data: data,
            options: options
        });
}

function fill_background_hover_color(data_length) {
    var backgroundColor      = new Array();
    var hoverBackgroundColor = new Array();

    for(i=0; i<=data_length-1; i++) {
        backgroundColor.push(random_rgb_color());     // Light color
        hoverBackgroundColor.push("rgb(46, 52, 54)"); // Dark color
    }

    return [backgroundColor, hoverBackgroundColor];
}
