<div class="block block-<?= $block->type() ?>">
    <div id="image-slider" class="keen-slider image-slider">

        <?php $images = $block->images()->toFiles(); ?>
        <?php foreach ($images as $image): ?>
            <figure class="keen-slider__slide">

                <img src="<?= $image->url() ?>" style="aspect-ratio:<?= $image->width() ?>/<?= $image->height() ?>"
                     alt="<?= $image->alt()->esc() ?>">
            </figure>

        <?php endforeach; ?>

    </div>

    <script type="text/javascript">
        function WheelControls(slider) {
            var touchTimeout
            var position
            var wheelActive

            function dispatch(e, name) {
                position.x -= e.deltaX
                position.y -= e.deltaY
                slider.container.dispatchEvent(
                    new CustomEvent(name, {
                        detail: {
                            x: position.x,
                            y: position.y,
                        },
                    })
                )
            }

            function wheelStart(e) {
                position = {
                    x: e.pageX,
                    y: e.pageY,
                }
                dispatch(e, "ksDragStart")
            }

            function wheel(e) {
                dispatch(e, "ksDrag")
            }

            function wheelEnd(e) {
                dispatch(e, "ksDragEnd")
            }

            function eventWheel(e) {
                e.preventDefault()
                if (!wheelActive) {
                    wheelStart(e)
                    wheelActive = true
                }
                wheel(e)
                clearTimeout(touchTimeout)
                touchTimeout = setTimeout(() => {
                    wheelActive = false
                    wheelEnd(e)
                }, 50)
            }

            slider.on("created", () => {
                slider.container.addEventListener("wheel", eventWheel, {
                    passive: true,
                })
            })
        }

        var image_slider = new KeenSlider("#image-slider", {
                mode: "snap",
                slides: {
                    perView: 'auto',
                    spacing: 20,
                },
            },
            [WheelControls])
    </script>
</div>