<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Language Selector</title>
    <style>
        @import url("https://fonts.googleapis.com/css?family=Open+Sans:400,600");
        /* VARS */
        /* MIXINS */
        /* STYLE THE HTML ELEMENTS (INCLUDES RESETS FOR THE DEFAULT FIELDSET AND LEGEND STYLES) */
        body, html {
            margin: 0;
            padding: 1rem;
            box-sizing: border-box;
            width: 100%;
            height: 100%;
            font-size: 16px;
            font-family: "Open Sans", "Helvetica", sans-serif;
            -webkit-font-smoothing: antialiased;
            background-color: #EEE;
        }

        fieldset {
            margin: 0;
            padding: 2rem;
            box-sizing: border-box;
            display: block;
            border: none;
            border: solid 1px #CCC;
            min-width: 0;
            background-color: #FFF;
        }
        fieldset legend {
            margin: 0 0 1.5rem;
            padding: 0;
            width: 100%;
            float: left;
            display: table;
            font-size: 1.5rem;
            line-height: 140%;
            font-weight: 600;
            color: #333;
        }
        fieldset legend + * {
            clear: both;
        }

        body:not(:-moz-handler-blocked) fieldset {
            display: table-cell;
        }

        /* TOGGLE STYLING */
        .toggle {
            margin: 0 0 1.5rem;
            box-sizing: border-box;
            font-size: 0;
            display: flex;
            flex-flow: row nowrap;
            justify-content: flex-start;
            align-items: stretch;
        }
        .toggle input {
            width: 0;
            height: 0;
            position: absolute;
            left: -9999px;
        }
        .toggle input + label {
            margin: 0;
            padding: 0.75rem 2rem;
            box-sizing: border-box;
            position: relative;
            display: inline-block;
            border: solid 1px #DDD;
            background-color: #FFF;
            font-size: 1rem;
            line-height: 140%;
            font-weight: 600;
            text-align: center;
            box-shadow: 0 0 0 rgba(255, 255, 255, 0);
            transition: border-color 0.15s ease-out, color 0.25s ease-out, background-color 0.15s ease-out, box-shadow 0.15s ease-out;
            /* ADD THESE PROPERTIES TO SWITCH FROM AUTO WIDTH TO FULL WIDTH */
            /*flex: 0 0 50%; display: flex; justify-content: center; align-items: center;*/
            /* ----- */
        }
        .toggle input + label:first-of-type {
            border-radius: 6px 0 0 6px;
            border-right: none;
        }
        .toggle input + label:last-of-type {
            border-radius: 0 6px 6px 0;
            border-left: none;
        }
        .toggle input:hover + label {
            border-color: #213140;
        }
        .toggle input:checked + label {
            background-color: #4B9DEA;
            color: #FFF;
            box-shadow: 0 0 10px rgba(102, 179, 251, 0.5);
            border-color: #4B9DEA;
            z-index: 1;
        }
        .toggle input:focus + label {
            outline: dotted 1px #CCC;
            outline-offset: 0.45rem;
        }
        @media (max-width: 800px) {
            .toggle input + label {
                padding: 0.75rem 0.25rem;
                flex: 0 0 50%;
                display: flex;
                justify-content: center;
                align-items: center;
            }
        }

        /* STYLING FOR THE STATUS HELPER TEXT FOR THE DEMO */
        .status {
            margin: 0;
            font-size: 1rem;
            font-weight: 400;
        }
        .status span {
            font-weight: 600;
            color: #B6985A;
        }
        .status span:first-of-type {
            display: inline;
        }
        .status span:last-of-type {
            display: none;
        }
        @media (max-width: 800px) {
            .status span:first-of-type {
                display: none;
            }
            .status span:last-of-type {
                display: inline;
            }
        }
        .mybtn{
            margin: 0;
            padding: 0.75rem 2rem;
            box-sizing: border-box;
            position: relative;
            display: inline-block;
            /*border: solid 1px #DDD;*/
            border-radius: 6px;
            /*background-color: #FFF;*/
            font-size: 1rem;
            line-height: 140%;
            font-weight: 600;
            text-align: center;
            /*box-shadow: 0 0 0 rgba(255, 255, 255, 0);*/
            /*transition: border-color 0.15s ease-out, color 0.25s ease-out, background-color 0.15s ease-out, box-shadow 0.15s ease-out;*/

            background-color: #4B9DEA;
            color: #FFF;
            /*box-shadow: 0 0 10px rgba(102, 179, 251, 0.5);*/
            border-color: #4B9DEA;
            /*z-index: 1;*/

        }
    </style>
</head>
<body>
    <div class="lang">
        <fieldset>
            <legend>Please select your language and submit:</legend>
            <div class="toggle">
                <input type="radio" name="sizeBy" value="weight" id="sizeWeight" checked="checked" />
                <label for="sizeWeight">English</label>
                <input type="radio" name="sizeBy" value="dimensions" id="sizeDimensions" />
                <label for="sizeDimensions">Hindi</label>
            </div>
{{--            <div>--}}
{{--                <button type="button" class="mybtn">Submit</button>--}}
{{--            </div>--}}
{{--            <p class="status">Toggle is <span>auto width</span><span>full width</span>.</p>--}}
        </fieldset>
    </div>
</body>
</html>