<!DOCTYPE html>
<html lang="en">

<head>
<?php include 'header.inc'; ?>
</head>

<body>
<?php include 'menu.inc'; ?>

<div class="fieldset">
  <article>
    <h2 class="title">VoiceXML editor features</h2>
  <section id="WIV">
    <h2>Color coding in the VoiceXML editor</h2>
      <p>The VoiceXML source editor automatically colorizes the source code using the settings specified on the XML Styles preferences. To change these colors, use the preference page at Window > Preferences > Web and XML > XML Files > XML Styles.</p>
  </section>

  <section id="WIE">
    <h2>VoiceXML coding tips</h2>
      <br/>
      <p>The following tips provide basic information on coding VoiceXML and using the VoiceXML editor.</p>
    <h3>VoiceXML application structure</h3>
      <p>VoiceXML applications can consist of one or more VoiceXML documents, plus any associated grammar, pronunciation, prerecorded audio, or ECMAScript files. In the Voice tools, generally, you should have one project for each voice application.</p>
      <p>VoiceXML documents consist of two basic types of dialogs: forms and menus.</p>
      <table>
        <tr>
          <th>Table 1. VoiceXML dialogs</th>
        </tr>
        <tr>
          <td>Type</td>
          <td>Description</tr>
        </tr>
        <tr>
          <td>Form</td>
          <td>A dialog that uses fields to supply information and accept data inputs.</tr>
        </tr>
        <tr>
          <td>Menu</td>
          <td>A dialog that offers the user one or more choices, and the selection routes the dialog flow to a different point in the application.</tr>
        </tr>
      </table>
      <h3>Features of the VoiceXML Editor</h3>
      <ul>
        <li>The DOCTYPE declaration is automatically added below the XML processing instruction (?xml...) when you create new VoiceXML files, which enables proper validation and Content Assist. If you open an existing VoiceXML file that does not already have the DOCTYPE, you can update the file with the correct definition by placing the cursor after the XML statement, using Content Assist, and selecting DOCTYPE.</li>
        <li>To use Content Assist, hold down the <strong>Ctrl</strong> key and press the <strong>Space bar</strong>. The pop-up window shows a list of valid tags or attributes at the cursor location.        </li>
        <li>You can specify attributes and their corresponding values in either the VoiceXML source editor or the Properties view.        </li>
        <li>The Outline view shows the hierarchy of tags in your VoiceXML file. When you select a tag, the corresponding lines are highlighted in the VoiceXML editor.        </li>
        <li>You can launch other editors from within the VoiceXML editor by following these steps:</li>
        <ol>
          <li>Place the cursor on the tag that has a reference to a grammar or audio file.</li>
          <li>Right-click on it to display the pop-up menu and select <strong>Edit Grammar File</strong> or <strong>Edit Audio File</strong>.</li>
        </ol>
        <li>Format options are available to automatically format your source code.</li>
        <li>Multiple-Language VoiceXML applications can be tested only when using a remote WebSphere® Voice Server environment.</li>
      </ul>
    </section>
     
  <section id="JSP">
    <h2>Content Assist in the VoiceXML editor</h2>
      <p>Content Assist is a pop-up window that provides a list of valid tags for the element or attribute at the cursor location.</p>
      <p>To open or enable the Content Assist window, place the cursor where you need the help in the source editor, following the steps below. </p>
      <ol>
        <li>Hold down the <strong>Ctrl</strong> key and press the <strong>Space bar</strong>.</li>
        <ul>
          <li>By default, Content Assist is set to automatically show suggestions as you enter source code. To edit the preference, select <strong>Window > Preferences > Web and XML > XML Files > XML Source.</strong></li>
          <li>The <strong>Automatically make suggestions</strong> check box is selected. Click it to deselect it, if preferred.          </li>
        </ul>
        <li>Type values in the <strong>Prompt when these characters are inserted</strong> text box to specify how you want to open the Content Assist pop-up window. By default, the symbol opens the Content Assist window. Click OK to save the setting.</li>
        <p>To select a tag listed in the pop-up window, use one of the following methods:
          <ul>
            <li>Double-click the tag.</li>
            <li>Use the keyboard arrow keys to highlight the item and press the <strong>Enter</strong> key.            </li>
          </ul>
        </p>
        <p>When you select a tag, the associated beginning and ending tags are inserted into your file at the current cursor location.
        <p>To close the Content Assist window, click outside the window, or press the <strong>Esc</strong> key.
        </p>
        </p>
      </ol>
      
  </section>
</article>
</div>

  <footer>
  <?php include 'footer.inc'; ?>
  </footer>
</body>
</html>