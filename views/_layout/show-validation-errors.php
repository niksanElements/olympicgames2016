<script>
    <?php
        foreach (array_reverse($this->validationErrors) as $fieldName => $errorMsg) {
            $fieldJson = json_encode($fieldName);
            $errorMsgJson = json_encode($errorMsg);
            echo "$(document).ready(function() {showValidationError($fieldJson, $errorMsgJson)});\n";
        }
    ?>
</script>
