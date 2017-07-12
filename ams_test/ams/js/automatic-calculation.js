/*

	formule : "{1, 2} = ({3, 4} * {1,7}) + {1,1};"

*/

$.fn.automaticCalculation = function(parameters) {

	function explode(string, char) {
		var strings = new Array();
		var lastI = 0;

		for(var i =0; i < string.length; i++) {
			if(string.charAt(i) == char) {
				strings.push(string.substring(lastI, i));
				lastI = i + 1;
			}
		}

		strings.push(string.substring(lastI, i));

		return strings;
	};

	function removeUselessSpaces(expression) {
		var newExpression = "";
		var remove = false;

		for(var i = 0; i < expression.length; i++) {
			var charAti = expression.charAt(i)

			     if(charAti === "{") remove = true;
			else if(charAti === "}") remove = false;

			if(charAti !== " " || !remove) newExpression += charAti;
		}

		return newExpression;
	};

	function getVariables(expression) {
		var variables = new Array();
		var getFirst  = false;
		var getSecond = false;
		var first     = "";
		var second    = "";

		for(var i = 0; i < expression.length; i++) {
			var charAti = expression.charAt(i)

			       if(charAti === "{") getFirst = true;
			  else if(getFirst && charAti === ",") {

				variables.push({
					x : parseInt(first)
				})

				getFirst  = false;
				getSecond = true;
				first     = "";

			} else if(getSecond && charAti === "}") {

				variables[variables.length - 1].y = parseInt(second);

				getSecond = false;
				second    = "";

			} else if(getFirst)  first  += charAti;
			  else if(getSecond) second += charAti;

		}

		return variables;
	};

	function replaceVariable(formule, i, j, value) {
		return formule.replace("{" + i + "," + j + "}", value);
	};

	return this.each(function(index) {

		if(typeof parameters.expressions === "undefined") parameters.expressions = "";
		if(typeof parameters.delimiter   === "undefined") parameters.delimiter   = ";";
		if(typeof parameters.disabled    === "undefined") parameters.disabled    = true;

		var explodedExpression = explode(parameters.expressions, parameters.delimiter);

		var expressionsDetailed = new Array();
		var table = $(this);

		for(var i = 0; i < explodedExpression.length; i++) {
			var expTarget = explodedExpression[i].substring(0, explodedExpression[i].indexOf("="));
			var expValue  = explodedExpression[i].substring(explodedExpression[i].indexOf("=") + 1);

			expressionsDetailed.push({
				target     : getVariables(removeUselessSpaces(expTarget))[0],
				variables  : getVariables(removeUselessSpaces(expValue)),
				expression : removeUselessSpaces(expValue)
			});
		}


		for(var i = 0; i < expressionsDetailed.length; i++) {
			for(var j = 0; j < expressionsDetailed[i].variables.length; j++) {
				(function() {
					var aliasI = i;
					var aliasJ = j;
					var variable = expressionsDetailed[aliasI].variables[aliasJ];
					var target = expressionsDetailed[aliasI].target;

					if(parameters.disabled) {
						table.children("tbody")
						     .children("tr:nth-child(" + (target.y + 1) + ")")
						     .children("td:nth-child(" + (target.x + 1) + ")")
						     .children("input:first-child, textarea:first-child")
						     .attr("disabled", "disabled");
				    }

					table.children("tbody")
					     .children("tr:nth-child(" + (variable.y + 1) + ")")
					     .children("td:nth-child(" + (variable.x + 1) + ")")
					     .children("input:first-child, textarea:first-child")
					.change(function() {

						var expressionToEval = expressionsDetailed[aliasI].expression;

						for(var k = 0; k < expressionsDetailed[aliasI].variables.length; k++) {
							var value = table.children("tbody")
									    	.children("tr:nth-child(" + (expressionsDetailed[aliasI].variables[k].y + 1) + ")")
									    	.children("td:nth-child(" + (expressionsDetailed[aliasI].variables[k].x+ 1) + ")")
									    	.children("input:first-child, textarea:first-child")
							    		.val();

				    		if(value === "") value = 0;
				    		else value = value.replace(/ /g, "");

							expressionToEval = replaceVariable(
								expressionToEval, 
								expressionsDetailed[aliasI].variables[k].x,
								expressionsDetailed[aliasI].variables[k].y,
								parseFloat(value)
							)

						}

						table.children("tbody")
						     .children("tr:nth-child(" + (target.y + 1) + ")")
						     .children("td:nth-child(" + (target.x + 1) + ")")
						     .children("input:first-child, textarea:first-child")
						     .val(eval(expressionToEval))
						     .change();
					});
				})();
			}
		}

	});

}