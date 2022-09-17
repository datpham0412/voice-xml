<!DOCTYPE html>
<html lang="en">

<head>
<?php include 'header.inc'; ?>
</head>

<body>
<?php include 'menu.inc'; ?>

<div class="fieldset">
  <article>
    <h2 class="title">Voice XML definitions</h2>
    <section id="WIV">
		  <h2>What is VoiceXML?</h2>
      <aside>
        <h3>Introduction to VoiceXML</h3>
        <p>VoiceXML, the Voice Extensible Markup Language, is an XML-based language used to create audio dialogs. These audio dialogs feature synthesized speech (TTS) or digitized audio (pre-recorded audio) to prompt the user, and they accept spoken words or DTMF key input. The VoiceXML application - or script - contains the logic that controls the flow of the dialog, and it's the script that prompts the caller, accepts the caller's input, and determines the next step for the caller.</p>
        </aside>
		<p> The Voice eXtensible Markup Language (VoiceXML) is an XML-based markup language for creating distributed voice applications that users can access from any telephone.<p>
        <p>VoiceXML is an emerging industry standard defined by the VoiceXML Forum, of which IBM is a founding member. It has been accepted for submission by the World Wide Web Consortium (W3C) as a standard for voice markup on the Web. </p>
        <p>The VoiceXML language lets you use a familiar markup style and Web server-side logic to deliver voice content to the Internet. The VoiceXML applications you create can interact with your existing back-end business data and logic.</p>
        <p> Users interact with these Web-based voice applications by speaking or by pressing telephone keys rather than through a graphical user interface.</p>
        <p> VoiceXML supports dialogs that feature: </p>
        <ul>
          <li>Spoken input</li>
          <li>Telephone keypad input</li>
          <li>Recording of spoken input</li>
          <li>Synthesized speech output ("text-to-speech")</li>
          <li>Recorded audio output</li>
          <li>Telephony features such as call transfer and disconnect</li>
          <li>Dialog flow control</li>
          <li>Scoping of input</li>

        </ul>
 


    </section>
    
    <section id="WIE">
    <h2>What is ECMAScript</h2>
      <p>ECMAScript, also known as JavaScript, is a programming language adopted by the European Computer Manufacturer's Association as a standard for performing computations in Web applications. ECMAScript is the official client-side scripting language of VoiceXML. ECMAScript is a limited programming model for simple data manipulation.      </p>
    <figure>
      <figcaption>ECMAScript Evolution and Version</figcaption>
      <div class="flip-box">
        <div class="flip-box-inner">
          <div class="flip-box-front">
            <img class = "ECMA" src="images/ECMA.png" alt = "Images ecma">
          </div>
          <div class="flip-box-back">
            <img class = "ECMA" src="images/ecma_2.png" alt = "Images ecma_2">
          </div>
        </div>
      </div>
    </figure>
  </section>
  <section id="JSP">
    <h2>JavaServer Pages for VoiceXML</h2>
      <p>A JavaServer Page (JSP) for VoiceXML is a VoiceXML file with dynamic content. JSP files are one way that the Voice tools implement server-side dynamic page content. JSP files allow a Web server, to dynamically add content to your VoiceXML pages before they are sent to a requesting browser.      </p>
      <p>When you deploy a JSP file to a Web server that provides a servlet engine, it is preprocessed into a servlet that starts on the Web server. This is in contrast with client-side ECMAScript (within "script" tags), which is started in a browser. A JSP page is ideal for tasks that are better suited to start on the server, such as accessing databases or calling JavaBeans™.</p>
      <p>In the Voice tools, you can create and edit a JSP file in the VoiceXML editor by adding your own text JSP tagging or JavaScript™, including Java™ source code inside of scriptlet tags. Typically, JSP files for VoiceXML have the file extension .jsv.</p>
      <p>The JSP 1.1 specification provides the ability to create custom JSP tags. Custom tags simplify complex actions and provide developers with greater control over page content. Custom tags are collected into a library. A tag library descriptor file (taglib.tld) is an XML document that provides information about the tag library, including the taglib short name, library description, and tag descriptions. Refer to the Sun Microsystems JSP 1.1 Specification, located on the Java Web site, for more details.      </p>
      <p>To use JSP 1.1 custom taglibs, you can import the taglib .tld and .jar files into your project to use them. If you import these files, place them under the webApplication folder. You can also reference a .tld file using a URI.</p>
      
    </section>


</article>
</div>
   
  <footer>
  <?php include 'footer.inc'; ?>
  </footer>
</body>
</html>