'use strict';
(function () {
    var Romanitalian = function(window, undefined ) {
        var RomanitalianInfo = {
            "personal": {
                "name": "Roman",
                "email": "01110010 01101111 01101101 01100001 01101110 01101001 01110100 01100001 01101100 01101001 01100001 01101110 00101110 01101110 01100101 01110100 01000000 01100111 01101101 01100001 01101001 01101100 00101110 01100011 01101111 01101101 ",
                "birthday": '1986-07-01',
                "getAge": function() {return new Date().getFullYear() - new Date(this.birthday).getFullYear()},
                "career": "Web Developer"
            },
            "languages": {
                "human": [
                    {"name": "rus", "level": "native"},
                    {"name": "eng", "level": "pre-intermediate"}
                ],
                "programming": [
                    {"name": "php", "level": 9},
                    {"name": "ES5", "level": 6},
                    {"name": "c++", "level": 3},
                    {"name": "python", "level": 4},
                    {"name": "android", "level": 5}
                ]
            }
        };
        function Romanitalian() {
            this.getInfo = function getInfo() {
                return RomanitalianInfo;
            };
        }
        return Romanitalian;
    }(window);
    var Utils = {
        binToTxt: function (str) {
            var newBin = str.split(" ");
            var binCode = [];
            for (var i = 0; i < newBin.length; i++) {
                binCode.push(String.fromCharCode(parseInt(newBin[i], 2)));
            }
            return binCode.join("");
        }
    };
    var ri = new Romanitalian();
    var riInfo = ri.getInfo();
    console.log('My email: ' + Utils.binToTxt(riInfo.personal.email));
    console.log('My programming languages and their level (own estimation):');
    console.table(riInfo.languages.programming);
    console.log('\n');
    console.log('All info: ' +riInfo);
})();
