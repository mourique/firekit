<div class="block block-<?= $block->type() ?>">

    <?php $block_id = "id" . substr(base_convert(md5($block->id()), 16, 32), 0, 12); ?>

    <div id="<?= $block_id ?>" class="keen-slider link-slider">

        <?php $items = $block->list()->toStructure(); ?>
        <?php foreach ($items as $item): ?>
            <div class="keen-slider__slide ">
                <a href="<?= $item->link()->toUrl() ?>" class="lightbox">
                    <figure>
                        <img src="<?= $item->image()->toFile()->resize(1500)->url() ?>" alt="<?= $item->image()->toFile()->alt() ?>">
                    </figure>
                    <span class="slide-title"><?= $item->title()->html() ?></span>
                </a>
            </div>

        <?php endforeach ?>

    </div>

    <script type="text/javascript">

        if (window.innerWidth < 768) {
            var slide_count = 1
        } else if (window.innerWidth < 1280) {
            var slide_count = 2
        } else {
            var slide_count = 3
        }

        function navigation(slider) {
            let wrapper, controls_wrapper, dots, arrowLeft, arrowRight

            function markup(remove) {
                wrapperMarkup(remove)
                dotMarkup(remove)
                arrowMarkup(remove)
            }

            function removeElement(elment) {
                elment.parentNode.removeChild(elment)
            }

            function createDiv(className) {
                var div = document.createElement("div")
                var classNames = className.split(" ")
                classNames.forEach((name) => div.classList.add(name))
                return div
            }

            function dotMarkup(remove) {
                if (remove) {
                    removeElement(dots)
                    return
                }
                dots = createDiv("dots")
                slider.track.details.slides.forEach((_e, idx) => {
                    var dot = createDiv("dot")
                    dot.addEventListener("click", () => slider.moveToIdx(idx))
                    dots.appendChild(dot)
                })
                controls_wrapper.appendChild(dots)
            }

            function arrowMarkup(remove) {
                if (remove) {
                    removeElement(arrowLeft)
                    removeElement(arrowRight)
                    return
                }
                arrowLeft = createDiv("arrow arrow--left")
                arrowLeft.addEventListener("click", () => slider.prev())
                arrowRight = createDiv("arrow arrow--right")
                arrowRight.addEventListener("click", () => slider.next())

                controls_wrapper.prepend(arrowLeft)
                controls_wrapper.appendChild(arrowRight)
            }

            function wrapperMarkup(remove) {
                if (remove) {
                    var parent = wrapper.parentNode
                    while (wrapper.firstChild)
                        parent.insertBefore(wrapper.firstChild, wrapper)
                    removeElement(wrapper)
                    return
                }
                wrapper = createDiv("navigation-wrapper")
                controls_wrapper = createDiv("controls-wrapper")

                slider.container.parentNode.appendChild(wrapper)
                wrapper.appendChild(slider.container)
                wrapper.appendChild(controls_wrapper)

            }


            function updateClasses() {
                var slide = slider.track.details.rel
                slide === 0
                    ? arrowLeft.classList.add("arrow--disabled")
                    : arrowLeft.classList.remove("arrow--disabled")
                slide === slider.track.details.slides.length - slide_count
                    ? arrowRight.classList.add("arrow--disabled")
                    : arrowRight.classList.remove("arrow--disabled")
                Array.from(dots.children).forEach(function (dot, idx) {
                    idx === slide
                        // idx === slide || idx === slide + 1 || idx === slide + 2
                        ? dot.classList.add("dot--active")
                        : dot.classList.remove("dot--active")
                })
            }

            slider.on("created", () => {
                markup()
                updateClasses()
            })
            slider.on("optionsChanged", () => {
                console.log(2)
                markup(true)
                markup()
                updateClasses()
            })
            slider.on("slideChanged", () => {
                updateClasses()
            })
            slider.on("destroyed", () => {
                markup(true)
            })
        }

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


        var link_slider = new KeenSlider("#<?= $block_id ?>", {
            mode: "snap",
            slides: {
                origin: "auto",
                perView: function () {
                    if (window.innerWidth < 768) {
                        return 1.2
                    } else if (window.innerWidth < 1280) {
                        return 2.2
                    } else {
                        return 3.2
                    }
                },
                spacing: 20,
            },
        }, [navigation, WheelControls])
    </script>
</div>