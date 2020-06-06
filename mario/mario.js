window.onload = function(){
	
	canvas = document.getElementById("canvas");
	gagne = document.getElementById("text");
	if(!canvas){
		alert("impossible de recuperer le canvas");
	}
	
	context = canvas.getContext('2d');
	
	if(!context){
		alert("impossible de recuperer le context du canvas");
	}

var dir;	
 document.addEventListener("keydown",deplace);
 function deplace(event){
	 if(event.keyCode == 40){
		 dir = "DOWN";
	 }
	 else if(event.keyCode == 38){
		 dir = "UP";
	 }
	 else if(event.keyCode == 37){
		 dir = "LEFT";
	 }
	 else if(event.keyCode == 39){
		 dir = "RIGHT";
	 }
	 
 }
 
		
		
	
	
	var unit = 34;
	var heightZone = 340;
	var widthZone = 340;
	var beginZoneX = 0;
	var beginZoneY = 0;
	
	
	var marioHaut = new Image();
	marioHaut.src = "image/mario_haut.gif";
	var marioBas = new Image();
	marioBas.src = "image/mario_bas.gif";
	var marioGauche = new Image();
	marioGauche.src = "image/mario_gauche.gif";
	var marioDroite = new Image();
	marioDroite.src = "image/mario_droite.gif";
	var marioDefault = new Image();
	
	var cible = new Image();
	cible.src = "image/objectif.png";

	
	var caisse = new Image();
	caisse.src = "image/caisse.jpg";
	
	var caisseOk = new Image();
	caisseOk.src = "image/caisse_ok.jpg";
	
	var mur = new Image();
	mur.src = "image/mur.jpg";
	
	var nbrH = widthZone/unit;
	var nbrV = heightZone/unit;
	   //var carte = new Array(1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,3,0,1,1,1,1,1,1,1,0,0,0,1,1,1,0,0,1,1,1,1,1,1,1,0,2,0,1,1,1,0,0,1,1,1,1,1,1,1,0,1,1,1,1,1,0,1,1,0,0,0,0,0,1,0,0,0,1,1,1,0,0,1,0,0,0,0,0,1,0,0,0,1,1,1,0,0,0,0,0,4,0,0,0,0,0,0,1,1,1,0,0,1,0,0,0,0,0,1,0,0,0,1,1,1,0,0,1,0,0,0,0,0,1,0,0,0,1,1,1,0,0,1,0,0,0,0,0,1,0,0,0,1,1,1,0,1,1,0,0,0,0,0,1,0,0,0,1,1,1,0,0,1,0,0,0,0,0,1,1,1,0,1,1,1,0,0,1,1,1,1,1,1,1,0,2,0,1,1,1,3,0,1,1,1,1,1,1,1,0,0,0,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1);
	  //var carte2 = new Array(1,1,1,1,1,1,1,1,1,1,1,1,3,1,1,1,1,0,0,1,1,1,0,1,1,1,1,2,0,1,1,3,0,1,1,1,1,0,0,1,1,0,0,2,0,4,0,0,0,1,1,0,0,0,1,1,1,0,0,1,1,0,1,1,1,1,1,2,0,1,1,3,1,1,1,1,1,0,0,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1);
    // var carte2 = new Array(1,1,1,1,1,1,1,1,1,1,1,3,1,0,3,0,0,0,0,1,1,0,1,0,0,0,0,2,0,1,1,0,1,0,2,0,0,0,0,1,1,0,1,1,4,1,0,0,0,1,1,0,1,1,1,1,0,0,0,1,1,0,1,0,0,0,0,0,0,1,1,0,0,0,2,0,0,0,0,1,1,0,0,0,0,0,0,3,0,1,1,1,1,1,1,1,1,1,1,1);
	//var carte2 = new Array(1,1,1,1,1,1,1,1,1,1,1,0,0,0,0,0,0,0,0,1,1,0,0,0,0,0,0,2,0,1,1,0,1,1,1,0,0,0,0,1,1,3,1,1,1,1,1,0,0,1,3,0,0,0,2,0,1,0,0,1,1,1,1,0,1,0,0,2,0,1,1,3,0,0,0,0,0,0,0,1,1,0,0,0,0,4,0,1,1,1,1,1,1,1,1,1,1,1,1,1);
    var carte2 = new Array(1,1,1,0,1,1,0,1,1,1,0,0,0,3,1,3,0,0,0,0,0,0,1,1,1,1,1,1,0,0,1,0,1,1,0,0,1,0,0,1,1,0,1,0,2,0,1,0,0,1,1,0,1,0,0,0,1,0,0,1,1,2,1,1,1,0,1,0,0,1,1,0,0,0,0,0,0,0,0,1,1,0,1,1,1,0,4,0,2,1,1,0,1,3,0,0,0,0,0,0); 
	var carte = new Array(100);
	let k=0;
	var Xdef;
	var Ydef;
	
	var XdefCais=0;
	var YdefCais=0;
	var X1defCais=0;
	var Y1defCais=0;
	var X2defCais=0;
	var Y2defCais=0;
	
	
	
	var XdefCible = 0;
	var YdefCible = 0;
	var X1defCible = 0;
	var Y1defCible = 0;
	var X2defCible = 0;
	var Y2defCible = 0;
	
	for(let i = 0;i < 10;i++){
		for(let j = 0;j<10;j++){
			carte[k] = {x:unit*j,y:unit*i,val:carte2[k]};
			k++;
		}
		
	}
	let t = 0;
	let t1 = 0;
	
	let v = 0;
	let v1 = 0;
	for(let i = 0;i<100;i++){
		if(carte[i].val == 4){
			Xdef = carte[i].x;
			Ydef = carte[i].y;
		}
		if(carte[i].val == 2 && t == 0){
			 t = i;
			XdefCais = carte[i].x;
			YdefCais = carte[i].y;
		}
		if(carte[i].val == 2 && i > t && t1 == 0){
			t1 = i;
			X1defCais = carte[i].x;
			Y1defCais = carte[i].y;
		}
		if(carte[i].val == 2 && i > t1){
			X2defCais = carte[i].x;
			Y2defCais = carte[i].y;
		}
		if(carte[i].val == 3 && v == 0){
			v = i;
			XdefCible = carte[i].x;
			YdefCible = carte[i].y;
		}
		if(carte[i].val == 3 && i > v && v1 == 0){
			v1 = i;
			X1defCible = carte[i].x;
			Y1defCible = carte[i].y;
		}
		if(carte[i].val == 3 && i > v1){
			X2defCible = carte[i].x;
			Y2defCible = carte[i].y;
		}
	}
	
	
	
	var Xcaisse = XdefCais;
	var Ycaisse = YdefCais;
	var X1caisse = X1defCais;
	var Y1caisse = Y1defCais;
	var X2caisse = X2defCais;
	var Y2caisse = Y2defCais;
	var defaultCaisse = {x:Xcaisse,y:Ycaisse};
	var defaultCaisse1 = {x:X1caisse,y:Y1caisse};
	var defaultCaisse2 = {x:X2caisse,y:Y2caisse};
	
	var Xcible = XdefCible;
	var Ycible = YdefCible;
	var X1cible = X1defCible;
	var Y1cible = Y1defCible;
	var X2cible = X2defCible;
	var Y2cible = Y2defCible;
	var defaultCible = {x:Xcible,y:Ycible};
	var defaultCible1 = {x:X1cible,y:Y1cible};
	var defaultCible2 = {x:X2cible,y:Y2cible};
	
	var Xdefault = Xdef;
	var Ydefault = Ydef;
	
	var defaultPos = {x:Xdefault,y:Ydefault};
	
	let audioName=new Audio();
audioName.src="1.mp3";

marioDefault = marioBas;
	function deplaceMario(){

	context.clearRect(beginZoneX,beginZoneY,widthZone,heightZone);
	
	context.drawImage(marioDefault,defaultPos.x,defaultPos.y,unit,unit);
	context.drawImage(caisse,defaultCaisse.x,defaultCaisse.y,unit,unit);
	context.drawImage(caisse,defaultCaisse1.x,defaultCaisse1.y,unit,unit);
	context.drawImage(caisse,defaultCaisse2.x,defaultCaisse2.y,unit,unit);
	
		for(let i = 0;i < 100;i++){
		  if(carte[i].val == 1)
			  context.drawImage(mur,carte[i].x,carte[i].y,unit,unit);
		  //if(carte[i].val == 2)
			//  context.drawImage(caisse,carte[i].x,carte[i].y,unit,unit);
		  //if(carte[i].val == 3)
			//  context.drawImage(cible,carte[i].x,carte[i].y,unit,unit);
		  
	}
	
	
  for(let i = 0;i < 100; i++){	
	if(dir == "DOWN"){
		if(defaultCaisse.y - unit == defaultPos.y && defaultCaisse.x == defaultPos.x){
			defaultCaisse.y += unit;
		}
		if(defaultCaisse1.y - unit == defaultPos.y && defaultCaisse1.x == defaultPos.x){
			defaultCaisse1.y += unit;
		}
		if(defaultCaisse2.y - unit == defaultPos.y && defaultCaisse2.x == defaultPos.x){
			defaultCaisse2.y += unit;
		}
			if(defaultCaisse.y + unit  == defaultCaisse1.y && defaultCaisse.x == defaultCaisse1.x){
				defaultCaisse.y -= unit;
				defaultPos.y -= unit;
			}
		for(let i=0;i<100;i++){
			if(carte[i].y - unit == defaultPos.y && carte[i].x == defaultPos.x && carte[i].val==1)
				defaultPos.y -= unit;
			if(carte[i].y  == defaultCaisse.y && carte[i].x == defaultCaisse.x &&  carte[i].val==1){
				defaultCaisse.y -= unit;
				defaultPos.y -= unit;
			}
			if(carte[i].y  == defaultCaisse1.y && carte[i].x == defaultCaisse1.x &&  carte[i].val==1){
				defaultCaisse1.y -= unit;
				defaultPos.y -= unit;
			}
			if(carte[i].y  == defaultCaisse2.y && carte[i].x == defaultCaisse2.x &&  carte[i].val==1){
				defaultCaisse2.y -= unit;
				defaultPos.y -= unit;
			}
			
		}
		if(defaultPos.y +unit == heightZone){
			defaultPos.y -= unit;
		}
		
		marioDefault = marioBas;
		context.drawImage(marioBas,defaultPos.x,defaultPos.y,unit,unit);
		defaultPos.y += unit;
		
	}
	
	if(dir == "UP"){
		if(defaultCaisse.y + unit == defaultPos.y && defaultCaisse.x == defaultPos.x){
			defaultCaisse.y -= unit;
		}
		if(defaultCaisse1.y + unit == defaultPos.y && defaultCaisse1.x == defaultPos.x){
			defaultCaisse1.y -= unit;
		}
		if(defaultCaisse2.y + unit == defaultPos.y && defaultCaisse2.x == defaultPos.x){
			defaultCaisse2.y -= unit;
		}
		for(let i=0;i<100;i++){
			if(carte[i].y + unit == defaultPos.y && carte[i].x == defaultPos.x && carte[i].val==1)
				defaultPos.y += unit;
			if(carte[i].y  == defaultCaisse.y && carte[i].x == defaultCaisse.x &&  carte[i].val==1){
				defaultCaisse.y += unit;
				defaultPos.y += unit;
			}
			if(carte[i].y  == defaultCaisse1.y && carte[i].x == defaultCaisse1.x &&  carte[i].val==1){
				defaultCaisse1.y += unit;
				defaultPos.y += unit;
			}
			if(carte[i].y  == defaultCaisse2.y && carte[i].x == defaultCaisse2.x &&  carte[i].val==1){
				defaultCaisse2.y += unit;
				defaultPos.y += unit;
			}
		}
		   if(defaultPos.y == beginZoneY){
			defaultPos.y += unit;
		}
		marioDefault = marioHaut;
		context.drawImage(marioHaut,defaultPos.x,defaultPos.y,unit,unit);
		defaultPos.y -= unit;
	}
       audioName.play();	
	if(dir == "LEFT"){
		if(defaultCaisse.x + unit == defaultPos.x && defaultCaisse.y == defaultPos.y){
			defaultCaisse.x -= unit;
		}
		if(defaultCaisse1.x + unit == defaultPos.x && defaultCaisse1.y == defaultPos.y){
			defaultCaisse1.x -= unit;
		}
		if(defaultCaisse2.x + unit == defaultPos.x && defaultCaisse2.y == defaultPos.y){
			defaultCaisse2.x -= unit;
		}
		for(let i=0;i<100;i++){
			if(carte[i].x + unit == defaultPos.x && carte[i].y == defaultPos.y && carte[i].val==1)
				defaultPos.x += unit;
			if(carte[i].x  == defaultCaisse.x && carte[i].y == defaultCaisse.y &&  carte[i].val==1){
				defaultCaisse.x += unit;
				defaultPos.x += unit;
			}
			if(carte[i].x  == defaultCaisse1.x && carte[i].y == defaultCaisse1.y &&  carte[i].val==1){
				defaultCaisse1.x += unit;
				defaultPos.x += unit;
			}
			if(carte[i].x  == defaultCaisse2.x && carte[i].y == defaultCaisse2.y &&  carte[i].val==1){
				defaultCaisse2.x += unit;
				defaultPos.x += unit;
			}
		}
		
		if(defaultPos.x == beginZoneX){
			defaultPos.x += unit;
		}
		
		marioDefault = marioGauche;
		context.drawImage(marioGauche,defaultPos.x,defaultPos.y,unit,unit);
		defaultPos.x -= unit;
	}
	
	if(dir == "RIGHT"){
		if(defaultCaisse.x - unit == defaultPos.x && defaultCaisse.y == defaultPos.y){
			defaultCaisse.x += unit;
		}
		if(defaultCaisse1.x - unit == defaultPos.x && defaultCaisse1.y == defaultPos.y){
			defaultCaisse1.x += unit;
		}
		if(defaultCaisse2.x - unit == defaultPos.x && defaultCaisse2.y == defaultPos.y){
			defaultCaisse2.x += unit;
		}
		for(let i=0;i<100;i++){
			if(carte[i].x - unit == defaultPos.x && carte[i].y == defaultPos.y && carte[i].val==1)
				defaultPos.x -= unit;
			if(carte[i].x  == defaultCaisse.x && carte[i].y == defaultCaisse.y &&  carte[i].val==1){
				defaultCaisse.x -= unit;
				defaultPos.x -= unit;
			}
			if(carte[i].x  == defaultCaisse1.x && carte[i].y == defaultCaisse1.y &&  carte[i].val==1){
				defaultCaisse1.x -= unit;
				defaultPos.x -= unit;
			}
			if(carte[i].x  == defaultCaisse2.x && carte[i].y == defaultCaisse2.y &&  carte[i].val==1){
				defaultCaisse2.x -= unit;
				defaultPos.x -= unit;
			}
		}
		
		if(defaultPos.x +unit == widthZone){
			defaultPos.x -= unit;
		}
		
		marioDefault = marioDroite;
		context.drawImage(marioDroite,defaultPos.x,defaultPos.y,unit,unit);
		defaultPos.x += unit;
		
	}
	
	let victory = 0;
 if(defaultCaisse.x == defaultCible.x && defaultCaisse.y == defaultCible.y){
   context.drawImage(caisseOk,defaultCible.x,defaultCible.y,unit,unit);
   victory++;
 }
 else if(defaultCaisse1.x == defaultCible.x && defaultCaisse1.y == defaultCible.y){
context.drawImage(caisseOk,defaultCible.x,defaultCible.y,unit,unit);
victory++;
}else if(defaultCaisse2.x == defaultCible.x && defaultCaisse2.y == defaultCible.y){	
   context.drawImage(caisseOk,defaultCible.x,defaultCible.y,unit,unit);
   victory++;
}else{
	context.drawImage(cible,defaultCible.x,defaultCible.y,unit,unit);
}

 if(defaultCaisse.x == defaultCible1.x && defaultCaisse.y == defaultCible1.y){
   context.drawImage(caisseOk,defaultCible1.x,defaultCible1.y,unit,unit);
   victory++;
 }
 else if(defaultCaisse1.x == defaultCible1.x && defaultCaisse1.y == defaultCible1.y){
context.drawImage(caisseOk,defaultCible1.x,defaultCible1.y,unit,unit);
victory++;
}else if(defaultCaisse2.x == defaultCible1.x && defaultCaisse2.y == defaultCible1.y){	
   context.drawImage(caisseOk,defaultCible1.x,defaultCible1.y,unit,unit);
   victory++;
}else{
	context.drawImage(cible,defaultCible1.x,defaultCible1.y,unit,unit);
}
 
 if(defaultCaisse.x == defaultCible2.x && defaultCaisse.y == defaultCible2.y){
   context.drawImage(caisseOk,defaultCible2.x,defaultCible2.y,unit,unit);
   victory++;
 }
 else if(defaultCaisse1.x == defaultCible2.x && defaultCaisse1.y == defaultCible2.y){
context.drawImage(caisseOk,defaultCible2.x,defaultCible2.y,unit,unit);
victory++;
}else if(defaultCaisse2.x == defaultCible2.x && defaultCaisse2.y == defaultCible2.y){	
   context.drawImage(caisseOk,defaultCible2.x,defaultCible2.y,unit,unit);
   victory++;
}else{
	context.drawImage(cible,defaultCible2.x,defaultCible2.y,unit,unit);
}


gagne.innerHTML="<img src='image/caisse.jpg'/> OK!!  "+victory;
 with(gagne.style){
		 fontFamily = "algerian";
		 color = "#348990";
		 position = "absolute";
		 left = "400";
		 top = "0";
 }

if(victory==3){
	audioName.pause();
	alert("vous avez gagnez!!!");
		clearInterval(game);
}
 
	dir = "rien";
   }
   
	}
	
	var game = setInterval(deplaceMario,1000/30);
}