<!DOCTYPE HTML>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<style>
  /* Style for div with class bigSite */
/* Style for the container */
.Mainbody {
    display: flex;
    flex-direction: column; /* Stack child elements vertically */
    align-items: stretch; /* Stretch child elements to fill the container */
    height: 100vh; /* Set container height to 100% of the viewport height */
}

/* Style for div with class bigSite */
.Mainbody .bigSite {
    border: 2px solid blue; /* Add your desired border styles here */
    height: 75%; /* Occupies 75% of the container height */
}

/* Style for divs with class smallSite1 and smallSite2 */
.Mainbody .smallSite1,
.Mainbody .smallSite2 {
    border: 2px solid red; /* Add your desired border styles here */
    flex-grow: 1; /* Occupies remaining space equally */
}


/* Repeat the process for other div elements with "Site" in their class names */

/* Style for div with class smallsecSite1 */
.Mainbody .smallsecSite1 {
    border: 2px solid orange; /* Add your desired border styles here */
    height: 20px; /* Add additional styles as needed */
}

/* Style for div with class smallsecSite2 */
.Mainbody .smallsecSite2 {
    border: 2px solid purple; /* Add your desired border styles here */
    height: 25px; /* Add additional styles as needed */
}

/* Repeat for other "Site" divs */

/* Add styles for other divs with "Site" in their class names */

/* Style for div with class lastSite */
.Mainbody .lastSite {
    border: 2px solid gray; /* Add your desired border styles here */
    height: 60px; /* Add additional styles as needed */
}

</style>
<body>
    <div class='Mainbody'>
      <h1>{{$res}}</h1>
      <div class="firstSec ">
        <div class="bigSite border border-primary"></div>
        <div class='smallSite1'></div>
        <div class="smallSite2"></div>
      </div>
        <div class="secondSec">
          <div class="smallsecSite1"></div>
          <div class="smallsecSite2"></div>
          <div class="smallsecSite3"></div>
          <div class="smallsecSite4"></div>
        </div>
        <div class="leftSite">
          <div class="LeftSite1"></div>
          <div class="LeftSite2"></div>
        </div>
        <div class="midSite">
          <div class="midSite1"></div>
          <div class="midSite2"></div>
          <div class="midSite3"></div>
        </div>
        <div class="lastSite"></div>
    </div>

</body>
</html>



<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
       $('#mytextarea').ckeditor();
    });
</script>