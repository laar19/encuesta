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
