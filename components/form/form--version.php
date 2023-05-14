<form class="form form--version" method="POST">
    <label class="form__label form__label--title" for="documentversion">nouvelle version</label>
    <input class="form__input form__input--title" type="text" name="documentversion">
    <input class="hidden" type="hidden" name="documentname" value="<?php echo $DocActiveData['document__name']; ?>" readonly="readonly">
    <input class="hidden" type="hidden" name="documentbinder" value="<?php echo $DocActiveData['document__binder']; ?>" readonly="readonly">
    <input class="hidden" type="hidden" name="documentlayer" value="<?php echo $DocActiveData['document__layer']; ?>" readonly="readonly">
    <input class="hidden" type="hidden" name="documenthaschapter" value="1" readonly="readonly">
    <input class="hidden" id="documentchapter" type="hidden" name="documentchapter" value="<?php echo $DocActiveData['document__chapter']; ?>" readonly="readonly">

    <button  class="form__submit"  type="submit" name="submitdocument">valider</button>
</form>