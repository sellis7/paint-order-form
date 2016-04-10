<!-- #script sellisMod02
    #created feb.09.2014
    #created by s l ellis -->
     <!-- SECONDARY FORM FIELDS TO ORDER -->
     <br />
         <h3>Please provide the following:</h3>
         <div class='tablestyle'>
             <div class='row'>
               <p><label for='fname'>first name: </label>
                   <input type='text' name='fname' id='fname' title='Enter first name'/>
                   <label for='lname'>last name: </label>
                   <input type='text' name='lname' id='lname' title='Enter last name' /></p>
             </div>
             <div class='row'>
                 <p><label for="email">e-mail: </label>
                     <input type='email' name='email' id='email'title='Enter your email' /></p>
             </div> 
             <div class='row'>
                 <div class='cell'>
                     <span>Choose a job type:&nbsp;&nbsp;&nbsp;&nbsp;</span>
                     <label for='laborProf'>Professional</label>
                      <input type='radio' name='labor' value='PROFESSIONAL' id='laborProf'
                             title='Choose professional'/>&nbsp;&nbsp;
                      <label for='laborReg'>Regular</label>
                      <input type='radio' name='labor' value='REGULAR' id='laborReg'
                             title='Choose regular'/>
                 </div>
                 <br />
                 <div class='cell'>
                     <span>paint finish:&nbsp;&nbsp;</span>
                     <select name='types' id='types' title='Choose a finish'>
                         <label for='types'>
                         <option value='FLAT'>flat</option>
                         <option value='SATIN'>satin</option>
                         <option value='GLOSS'>gloss</option>
                         </label>
                     </select>
                 </div>
                 <br />
                 <div class='cell'>
                     <span>paint color:&nbsp;&nbsp;</span>
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

             </div>
             <p>
                <input type='submit' name='order' value='Place Order' />
             </p>
         </div> <!-- end tablestyle -->
