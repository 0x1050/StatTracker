//------------------------------------------------Animation
//We probably won't call fadeIn() or fadeOut() directly,
//they are really just helper functions for loadFragment()
function fadeIn (element)  {
        element.style.display = 'block';
        let opacity = 0;
        let request;

        const animation = () => {
            element.style.opacity = opacity += 0.01;
            if (opacity == 1) {
                cancelAnimationFrame(request);
            }
        };

        const rAf = () => {
            request = requestAnimationFrame(rAf);
            animation();
        };
        rAf();
};

function fadeOut(element) {
    let opacity = 1;
    let request;

    const animation = () => {
        element.style.opacity = opacity -= 0.01;
        if (opacity == 0) {
            cancelAnimationFrame(request);
        }
    };

    const rAf = () => {
        request = requestAnimationFrame(rAf);
        animation();
    };
    rAf();
    element.style.display = 'none';
}

//-----------------------------------------------------AJAX
//For most cases, you will call this function without
//a value for fade. The only time you won't, you'll use a 0
//with. Do this when loding a page for the first time while
//the element is hidden by "display: none" in the css
function loadFragment(url, element, fade = 1) {
    //Create request and select form div
    var xhr = new XMLHttpRequest();
    //Set request, send it
    xhr.open("GET", url, true);
    xhr.send();
    //Handle request
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            if (fade == 0) {
                element.innerHTML = xhr.responseText;
                fadeIn(element);
            }
            else {
                fadeOut(element);
                element.innerHTML = xhr.responseText;
                fadeIn(element);
            }
        }
    }
}
