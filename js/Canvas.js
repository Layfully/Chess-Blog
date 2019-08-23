            var canvas = document.getElementById("canvas");
            var context = canvas.getContext("2d");
            var paragraphs = document.getElementsByClassName("paragraph");
            var focalLength = 1000000;
            var width = canvas.width = window.innerWidth - 107;
            var height = canvas.height = window.innerHeight;
            let speed = new Vector3(1, 1, 1);
            context.translate(canvas.width /2 , canvas.height / 2 );



            function Vector3(x,y,z){
                this.x = x;
                this.y = y;
                this.z = z;

                this.rotateX = function(angle){
                    var radian = angle * Math.PI / 180;
                    var cosa = Math.cos(radian);
                    var sina = Math.sin(radian);
                    var y = this.y * cosa - this.z * sina;
                    var z = this.y * sina + this.z * cosa;
                    return new Vector3(this.x, y, z)
                }
                this.rotateY = function(angle){
                    var radian = angle * Math.PI / 180;
                    var cosa = Math.cos(radian);
                    var sina = Math.sin(radian);
                    var z = this.z * cosa - this.x * sina
                    var x = this.z * sina + this.x * cosa
                    return new Vector3(x,this.y, z)
                }
                this.rotateZ = function(angle){
                    var radian = angle * Math.PI / 180;
                    var cosa = Math.cos(radian);
                    var sina = Math.sin(radian);
                    var x = this.x * cosa - this.y * sina
                    var y = this.x * sina + this.y * cosa
                    return new Vector3(x, y, this.z)
                }
            }

            function Vector2(x,y,z){
                this.x = (x * focalLength) / (z + focalLength);
                this.y = (y * focalLength) / (z + focalLength);
            }

            var points3D = [];
            var points2D = {};

            function CreateMultiplePoints3D(pointsxyz){
                var numberOfVectorsToCreate = pointsxyz / 3;
                var j = 0;
                for(var i = 0; i < pointsxyz.length / 3; i++){
                    points3D[i] = new Vector3(pointsxyz[j] / 2.3, pointsxyz[j+1] / 2.3, pointsxyz[j+2] / 2.3);
                    j += 3;
                }
            }

            function CreateMultiplePoints2D(points){
                for(i = 0; i < points.length; i++){
                    points2D[i] = new Vector2(points[i].x,points[i].y,points[i].z);
                }
            }

            function RotatePoints3D(speed){
                for(i = 0; i < points3D.length; i++){
                    points3D[i] = points3D[i].rotateX(speed.x);
                    points3D[i] = points3D[i].rotateY(speed.y);
                    points3D[i] = points3D[i].rotateZ(speed.z);
                }
            }

            CreateMultiplePoints3D([
                -200,0,0,
                -141,0,141,
                0,0,200,
                141,0,141,
                200,0,0,
                141,0,-141,
                0,0,-200,
                -141,0,-141,//7

                -184,53,0,
                -130,53,130,
                0,53,184,
                130,53,130,
                184,53,0,
                130,53,-130,
                0,53,-184,
                -130,53,-130, //15

                -156,70,0,
                -110,70,110,
                0,70,156,
                110,70,110,
                156,70,0,
                110,70,-110,
                0,70,-156,
                -110,70,-110,//23

                -170,106,0,
                -120,106,120,
                0,106,170,
                120,106,120,
                170,106,0,
                120,106,-120,
                0,106,-170,
                -120,106,-120, //31

                -114,147,0,
                -81,147,81,
                0,147,114,
                81,147,81,
                114,147,0,
                81,147,-81,
                0,147,-114,
                -81,147,-81,//39

                -123,169,0,
                -87,169,87,
                0,169,123,
                87,169,87,
                123,169,0,
                87,169,-87,
                0,169,-123,
                -87,169,-87,//47

                -92,184,0,
                -65,184,65,
                0,184,92,
                65,184,65,
                92,184,0,
                65,184,-65,
                0,184,-92,
                -65,184,-65, //55

                -68,523,0,
                -48,523,48,
                0,523,68,
                48,523,48,
                68,523,0,
                48,523,-48,
                0,523,-68,
                -48,523,-48, //63

                -136,545,0,
                -96,545,96,
                0,545,136,
                96,545,96,
                136,545,0,
                96,545,-96,
                0,545,-136,
                -96,545,-96, //71

                -98,565,0,
                -69,565,69,
                0,565,98,
                69,565,69,
                98,565,0,
                69,565,-69,
                0,565,-98,
                -69,565,-69, //79

                -91,578,0,
                -64,578,64,
                0,578,91,
                64,578,64,
                91,578,0,
                64,578,-64,
                0,578,-91,
                -64,578,-64, //87

                -72,588,0,
                -51,588,51,
                0,588,72,
                51,588,51,
                72,588,0,
                51,588,-51,
                0,588,-72,
                -51,588,-51, //95

                -72,644,0,
                -51,644,51,
                0,644,72,
                51,644,51,
                72,644,0,
                51,644,-51,
                0,644,-72,
                -51,644,-51, //103

                -92,680,0,
                -65,680,65,
                0,680,92,
                65,680,65,
                92,680,0,
                65,680,-65,
                0,680,-92,
                -65,680,-65, //111

                //TRIANGLES

                -110,716,45, //104 and 105 //112
                -45,716,110, // 105 and 106 ... //113
                45,716,110, //106 and 107
                110,716,45,
                110,716,-45,
                45,716,-110,
                -45,716,-110,
                -110,716,-45,//119


                -83,687,0,
                -59,687,59,
                0,687,83,
                59,687,59,
                83,687,0,
                59,687,-59,
                0,687,-83,
                -59,687,-59,//127

                -55,700,0,
                -39,700,39,
                0,700,55,
                39,700,39,
                55,700,0,
                39,700,-39,
                0,700,-55,
                -39,700,-39, //135

                -56,716,0,
                -39,716,39,
                0,716,56,
                39,716,39,
                56,716,0,
                39,716,-39,
                0,716,-56,
                -39,716,-39, //143

                -22,737,0,
                -15,737,15,
                0,737,22,
                15,737,15,
                22,737,0,
                15,737,-15,
                0,737,-22,
                -15,737,-15, //151

                -31,759,0,
                -22,759,22,
                0,759,31,
                22,759,22,
                31,759,0,
                22,759,-22,
                0,759,-31,
                -22,759,-22, // 159

                -22,781,0,
                -15,781,15,
                0,781,22,
                15,781,15,
                22,781,0,
                15,781,-15,
                0,781,-22,
                -15,781,-15,// 167


                0,791,0  //168 centrum wszechświata
            ]);

            CreateMultiplePoints2D(points3D);
            Draw();

/*
            window.requestAnimationFrame(Animate);
            function Animate(){
                RotatePoints3D(speed);
                CreateMultiplePoints2D(points3D);
                Draw();
                window.requestAnimationFrame(Animate);
            }
*/
            function DrawBase(min,max){
                for( var i = min ; i <= max; i++){
                    context.lineTo(points2D[i].x , -points2D[i].y);
                    if(i == max){
                        context.lineTo(points2D[i-7].x , -points2D[i-7].y);
                    }
                }
            }

            function Draw(){

                context.clearRect(-width / 2 , - height /2  ,width , height);

                context.beginPath();
                DrawBase(0,7);
                DrawBase(8,15);
                DrawBase(16,23);
                DrawBase(24,31);
                DrawBase(32,39);
                DrawBase(40,47);
                DrawBase(48,55);
                DrawBase(56,63);
                DrawBase(64,71);
                DrawBase(72,79);
                DrawBase(80,87);
                DrawBase(88,95);
                DrawBase(96,103);
                DrawBase(104,111);
                context.lineTo(points2D[112].x , -points2D[112].y);
                context.lineTo(points2D[105].x , -points2D[105].y);
                context.lineTo(points2D[113].x , -points2D[113].y);
                context.lineTo(points2D[106].x , -points2D[106].y);
                context.lineTo(points2D[114].x , -points2D[114].y);
                context.lineTo(points2D[107].x , -points2D[107].y);
                context.lineTo(points2D[115].x , -points2D[115].y);
                context.lineTo(points2D[108].x , -points2D[108].y);
                context.lineTo(points2D[116].x , -points2D[116].y);
                context.lineTo(points2D[109].x , -points2D[109].y);
                context.lineTo(points2D[117].x , -points2D[117].y);
                context.lineTo(points2D[110].x , -points2D[110].y);
                context.lineTo(points2D[118].x , -points2D[118].y);
                context.lineTo(points2D[111].x , -points2D[111].y);
                context.lineTo(points2D[119].x , -points2D[119].y);
                context.lineTo(points2D[104].x , -points2D[104].y);
                context.moveTo(points2D[120].x , -points2D[120].y);
                DrawBase(120,127);
                DrawBase(128,135);
                context.moveTo(points2D[120].x , -points2D[120].y);
                context.lineTo(points2D[112].x , -points2D[112].y);
                context.lineTo(points2D[121].x , -points2D[121].y);
                context.lineTo(points2D[113].x , -points2D[113].y);
                context.lineTo(points2D[122].x , -points2D[122].y);
                context.lineTo(points2D[114].x , -points2D[114].y);
                context.lineTo(points2D[123].x , -points2D[123].y);
                context.lineTo(points2D[115].x , -points2D[115].y);
                context.lineTo(points2D[124].x , -points2D[124].y);
                context.lineTo(points2D[116].x , -points2D[116].y);
                context.lineTo(points2D[125].x , -points2D[125].y);
                context.lineTo(points2D[117].x , -points2D[117].y);
                context.lineTo(points2D[126].x , -points2D[126].y);
                context.lineTo(points2D[118].x , -points2D[118].y);
                context.lineTo(points2D[127].x , -points2D[127].y);
                context.lineTo(points2D[119].x , -points2D[119].y);
                context.lineTo(points2D[120].x , -points2D[120].y);
                context.moveTo(points2D[128].x , -points2D[128].y);
                DrawBase(136,143);
                DrawBase(144,151);
                DrawBase(152,159);
                DrawBase(160,167);
                for(var i = 1; i <= 167; i++){
                    if(i<=160){
                        context.moveTo(points2D[i].x , -points2D[i].y);
                        context.lineTo(points2D[i+8].x , -points2D[i+8].y);
                    }
                    else{
                        context.moveTo(points2D[i].x , -points2D[i].y);
                        context.lineTo(points2D[168].x , -points2D[168].y);
                    }
                }

                context.stroke();
            }

            window.onresize = function () {
                width = canvas.width = window.innerWidth - 107;
                height = canvas.height = window.innerHeight;
                context.translate(canvas.width /2 , canvas.height / 2 );

                CreateMultiplePoints2D(points3D);
                Draw();
            }

            alert('uzyj klawiszy a-d, w-s, q-e aby zmienić rotację');

            document.addEventListener('keydown', checkKey);



            let rotationVector = new Vector3(0, 0, 0);
            function checkKey(e) {

                e = e || window.event;

                // a-d - x rotation
                // w-s - y rotation
                // q-e - z rotation 

                //didn't have time to do this on quaternions so gimbal lock is an issue.


                if (e.keyCode === 87) {
                    rotationVector.x = 1;
                    rotationVector.y = 0;
                    rotationVector.z = 0;
                    RotatePoints3D(rotationVector);
                    CreateMultiplePoints2D(points3D);
                    Draw();
                    // w 
                }
                else if (e.keyCode == 68) {
                    rotationVector.x = 0;
                    rotationVector.y = 0;
                    rotationVector.z = -1;
                    RotatePoints3D(rotationVector);
                    CreateMultiplePoints2D(points3D);
                    Draw();
                    // d 
                }
                else if (e.keyCode == 83) {
                    rotationVector.x = -1;
                    rotationVector.y = 0;
                    rotationVector.z = 0;
                    RotatePoints3D(rotationVector);
                    CreateMultiplePoints2D(points3D);
                    Draw();
                    // s
                }
                else if (e.keyCode == 65) {
                    rotationVector.x = 0;
                    rotationVector.y = 0;
                    rotationVector.z = 1;
                    RotatePoints3D(rotationVector);
                    CreateMultiplePoints2D(points3D);
                    Draw();
                    // a 
                }
                else if(e.keyCode == 81) {
                    rotationVector.x = 0;
                    rotationVector.y = 1;
                    rotationVector.z = 0;
                    RotatePoints3D(rotationVector);
                    CreateMultiplePoints2D(points3D);
                    Draw();
                    // q 
                }
                else if(e.keyCode == 69) {
                    rotationVector.x = 0;
                    rotationVector.y = -1;
                    rotationVector.z = 0;
                    RotatePoints3D(rotationVector);
                    CreateMultiplePoints2D(points3D);
                    Draw();
                    // e 
                }
            }
