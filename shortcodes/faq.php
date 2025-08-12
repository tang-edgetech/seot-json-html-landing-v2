<?php
if( !empty($data[0]['question']) && !empty($data[0]['answer']) ) {
?>
<section class="" id="faq">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12 px-4">
                <h2>Soalan Lazim (FAQ)</h2>
                <div class="accordion" id="accordionFAQ">
                <?php $i = 1;
                foreach ( $data as $item ) {
                    $title = $item['question'];
                    $body = $item['answer'];
                    if( $title && $body ) {
                        $heading_class = 'accordion-button';
                        $heading_expanded = 'true';
                        $body_class = 'accordion-collapse collapse show';
                        if( $i > 1 ) {
                            $heading_class = 'accordion-button collapsed';
                            $heading_expanded = 'false';
                            $body_class = 'accordion-collapse collapse';
                        }
                        $index = str_pad($i, 2, "0", STR_PAD_LEFT);
                        $body = convert_string_url($body);
                        echo '<div class="accordion-item"><h3 class="accordion-header"><button class="'.$heading_class.'" type="button" data-bs-toggle="collapse" data-bs-target="#collapse'.$index.'" aria-expanded="'.$heading_expanded.'" aria-controls="collapse'.$index.'">'.$title.'</button></h3><div id="collapse'.$index.'" class="'.$body_class.'" data-bs-parent="#accordionFAQ"><div class="accordion-body">'.$body.'</div></div></div>';
                        $i++;
                    }
                } ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
}
?>