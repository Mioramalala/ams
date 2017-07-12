
var EVENTSARRAY = new Array();

function searchIndexElementEvent (Element,Event){
	var index = new Array();
	for(var i = 0; i < EVENTSARRAY.length; i++) {
		if(EVENTSARRAY[i].Element == Element && EVENTSARRAY[i].Event == Event) {index.push(i);}
	}

	return index;
}

if(!Element.prototype.emitEvent){
	Element.prototype.emitEvent = function (Event){
		var index = searchIndexElementEvent(this,Event);
		for(var i = 0; i < index.length;i++)
			{EVENTSARRAY[index[i]].Func();}
	}
}

if(!Element.prototype.addEvent){
	Element.prototype.addEvent = function (Event,Func){
		var arrayElement = {};

		arrayElement.Element = this;
		arrayElement.Event   = Event;
		arrayElement.Func    = Func;

		EVENTSARRAY.push(arrayElement);
	}
}

if(!Element.prototype.removeEvent){
	Element.prototype.removeEvent = function (Event){
		var index = searchIndexElementEvent(this,Event);
		for(var i = 0; i < index.length;i++)
			EVENTSARRAY.splice(index[i]-i,1);
	}
}
