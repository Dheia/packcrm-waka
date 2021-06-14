var scrollpos = window.scrollY;
var myWindow = window;



window.instanciateMenu = function () {
    var menu = this;
    return {
        isOpen: false,
        onTop: true,
        isOpenOnTop() {
            if (this.isOpen || this.onTop) {
                return true
            } else {
                return false
            }
        },
        bgColor() {
            if (this.isOpen) {
                return 'bg-mydark'
            } else if (this.onTop) {
                return 'bg-trasnparent'
            } else {
                return 'bg-white shadow'
            }
        },
        isImageW() {
            if (this.isOpen || this.onTop) {
                return true
            } else {
                return false
            }
        },
        init(elemId) {
            var ceci = this
            window.addEventListener('scroll', function () {
                scrollpos = window.scrollY || document.documentElement.scrollTop;
                if (scrollpos == 0) {
                    ceci.onTop = true;
                } else {
                    ceci.onTop = false;
                }
                //console.log(ceci.bgColor)
            })
        }

    }
}
