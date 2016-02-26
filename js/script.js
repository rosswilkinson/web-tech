//<![CDATA[
        function offerAppear(id, id2, state) {
            'use strict';
            var element = document.getElementById(id);
            var element2 = document.getElementById(id2);
            element.style.visibility = state;
            element2.style.visibility = state;
        }

        function cssFile() {
            var element3 = document.getElementById('changeCSS');
            var cssString = document.getElementById('standardStyles');

            if (cssString.href.endsWith('css/style.css')) {
                element3.innerHTML = 'Normal colours <i class="fa fa-adjust"></i>';
                document.getElementById('standardStyles').href = 'css/highContrast.css';
            } else {
                element3.innerHTML = 'High contrast <i class="fa fa-adjust"></i>';
                document.getElementById('standardStyles').href = 'css/style.css';
            }
        }
        
        function changeFontSize( id, size) {
            var element4 = document.getElementById( id);
            element4.style.fontSize = size;
        }

        //]]>