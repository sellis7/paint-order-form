<!-- #script sellisMod02
    #created feb.09.2014
    #created by s l ellis -->
     <!-- SECONDARY FORM FIELDS TO ORDER -->
         <h3>Please provide the following:</h3>
         <div class='tablestyle'>
             <div class='row'>
               <p><label for='fname'>first name: </label>
                   <input type='text' name='fname' id='fname' title='Enter first name'/>
                   <label for='lname'>last name: </label>
                   <input type='text' name='lname' id='lname' title='Enter last name' /></p>
             </div> <!-- end row 1 -->
             <div class='row'>
                 <p><label for="email">e-mail: </label>
                     <input type='email' name='email' id='email'title='Enter your email' /></p>
             </div> <!-- end row 2 -->
             <div class='row'>
                 <div class="cell">
                     Choose a job type:
                 </div>
                 <div class="cell">
                     paint finish:
                 </div>
                 <div class="cell">
                     paint color:
                 </div>
             </div> <!-- end row 3 -->
             <div class="row">
                 <div class="cell"><p>
                   <label for='laborProf'>
                    Professional</label>
                    <input type='radio' name='labor' value='PROFESSIONAL' id='laborProf'
                           title='Choose professional'/><br />
                    <label for='laborReg'>
                    Regular</label>
                    <input type='radio' name='labor' value='REGULAR' id='laborReg'
                           title='Choose regular'/>
                </p></div>
                <div class='cell'>
                       <select name='types' id='types' title='Choose a finish'>
                           <label for='types'>
                           <option value='FLAT'>flat</option>
                           <option value='SATIN'>satin</option>
                           <option value='GLOSS'>gloss</option>
                           </label>
                       </select>
                </div>
                 <div class='cell'>
                     <select name='colors' id='colors' title='Choose a color'>
                         <label for='colors'>
                         <option value='Cyan'>Cyan</option>
                         <option value='Magenta'>Magenta</option>
                         <option value='Yellow'>Yellow</option>
                         <option value='Black'>Black</option>
                         <option value='Red'>Red</option>
                         <option value='Green'>Green</option>
                         <option value='Blue'>Blue</option>
                         </label>
                      </select> 
                 </div>
                 
             </div> <!-- end row 4 -->
             <p>
                <input type='submit' name='order' value='Place Order' />
             </p>
         </div> <!-- end tablestyle -->