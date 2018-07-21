<?php echo form_open("home/tt");?>
    <div class="row">
      <div class="col-md-10 mb-4">
        <p id="radio_active">Is Active</p>
        <input type="hidden" value="False" name="koko" />
        <div class="switch">
            <label>
                Off
                <input type="checkbox" value="True" name="koko" />
                <span class="lever"></span> On
            </label>
        </div>
        
      </div>
    </div>
    <input type="submit"></input>
</form>
 
