panel.plugin("felixf/firekit", {
  icons: {
    'layout-row-line': '<path d="M19 11V5H5V11H19ZM19 13H5V19H19V13ZM4 3H20C20.5523 3 21 3.44772 21 4V20C21 20.5523 20.5523 21 20 21H4C3.44772 21 3 20.5523 3 20V4C3 3.44772 3.44772 3 4 3Z" fill="currentColor"></path>',
    'layout-top-line': '<path d="M21 3C21.5523 3 22 3.44772 22 4V20C22 20.5523 21.5523 21 21 21H3C2.44772 21 2 20.5523 2 20V4C2 3.44772 2.44772 3 3 3H21ZM4 10V19H20V10H4ZM4 8H20V5H4V8Z" fill="currentColor"></path>',
    'layout-bottom-line': '<path d="M21 3C21.5523 3 22 3.44772 22 4V20C22 20.5523 21.5523 21 21 21H3C2.44772 21 2 20.5523 2 20V4C2 3.44772 2.44772 3 3 3H21ZM4 16V19H20V16H4ZM4 14H20V5H4V14Z" fill="currentColor"></path>',
    'align-top': '<path d="M3 3H21V5H3V3ZM8 11V21H6V11H3L7 7L11 11H8ZM18 11V21H16V11H13L17 7L21 11H18Z" fill="currentColor"></path>',
    'align-vertically': '<path d="M3 11H21V13H3V11ZM18 18V21H16V18H13L17 14L21 18H18ZM8 18V21H6V18H3L7 14L11 18H8ZM18 6H21L17 10L13 6H16V3H18V6ZM8 6H11L7 10L3 6H6V3H8V6Z" fill="currentColor"></path>',
    'align-bottom': '<path d="M3 19H21V21H3V19ZM8 13H11L7 17L3 13H6V3H8V13ZM18 13H21L17 17L13 13H16V3H18V13Z" fill="currentColor"></path>',
  },
  blocks: {
    text: {
      computed: {
        component() {
          const component = "k-" + this.textField.type + "-input";
          if (this.$helper.isComponent(component)) {
            return component;
          }
          // fallback to writer
          return "k-writer";
        },
        textField() {
          return this.field("text", {});
        }
      },
      methods: {
        focus() {
          this.$refs.input.focus();
        }
      },
      template: `
        <component
          :is="component"
          ref="input"
          v-bind="textField"
          :value="content.text"
          :data-size="content.size"
          class="k-block-type-text-input"
          @input="update({ text: $event })"
        />
      `
    },
    heading: {
      computed: {
        textField() {
          return this.field("heading", {
            marks: true
          });
        }
      },
      methods: {
        focus() {
          this.$refs.input.focus();
        }
      },
      template: `
        <div :data-level="content.level" :data-size="content.size" :data-centered="content.centered" class="k-block-type-heading-input">
          <k-writer
            ref="input"
            :inline="true"
            :marks="textField.marks"
            :placeholder="textField.placeholder"
            :value="content.text"
            @input="update({ text: $event })"
          />
        </div>
        `
    },
    image: {
      computed: {
        captionMarks() {
          return this.field("caption", {marks: true}).marks;
        },
        crop() {
          return this.content.crop || false;
        },
        padding() {
          return "padding-top: " + this.content.padding_top + "; padding-right: " + this.content.padding_right + "; padding-bottom: " + this.content.padding_bottom + "; padding-left: " + this.content.padding_left || false;
        },
        src() {
          if (this.content.location === "web") {
            return this.content.src;
          }
          if (this.content.image[0]?.url) {
            return this.content.image[0].url;
          }
          return false;
        },
        ratio() {
          return this.content.ratio || false;
        }
      },
      template: `
        <k-block-figure
          :caption="content.caption"
          :caption-marks="captionMarks"
          :empty-text="$t('field.blocks.image.placeholder') + ' …'"
          :is-empty="!src"
          empty-icon="image"
          @open="open"
          @update="update"
        >
          <template v-if="src">
            <k-aspect-ratio v-if="ratio" :ratio="ratio" :cover="crop">
              <img :style="padding" :alt="content.alt" :src="src" />
            </k-aspect-ratio>
            <img

              v-else
              :style="padding"
              :alt="content.alt"
              :src="src"
              class="k-block-type-image-auto"
            />
          </template>
        </k-block-figure>
      `
    },
    button: {
      computed: {
        placeholder() {
          return "Button text …";
        }
      },
      template: `
        <input
          type="text"
          placeholder="Button text …"
          :value="content.text"
          @input="update({ text: $event.target.value })"
        />
      `
    },
    datablock: {
      computed: {},
      template: `
        <div @dblclick="open">
          <div v-if="content.datablocks.length">
            <div v-for="(item, index) in content.datablocks" class="datablock-item" :key="index">
              <div class="datablock-headline">{{ item.headline }}</div>
              <div class="datablock-content" v-html="item.text"></div>
            </div>
          </div>
          <div v-else>No questions yet</div>
        </div>
      `
    },
    diashow: {
      computed: {},
      template: `
        <div @click="open">
          Diashow
        </div>
      `
    },
    linklist: {
      computed: {},
      template: `
        <div @dblclick="open">
          <div v-if="content.list.length">
            <span v-for="(item, index) in content.list" class="k-block-type-linklist-item" :key="index">
              <span v-html="item.title"></span>
            </span>
          </div>
          <div v-else>Keine Seiten bisher</div>
        </div>
      `
    },
    logoticker: {
      computed: {},
      template: `
        <div @click="open">
          Logoticker
        </div>
      `
    },
    imageslider: {
      computed: {},
      template: `
        <div @click="open">
          Imageslider
        </div>
      `
    },
    linkslider: {
      computed: {},
      template: `
        <div @click="open">
          <div class="linkslider_image"></div>
          <div class="linkslider_image">Linkslider</div>
          <div class="linkslider_image"></div>
        </div>
      `
    }
    // more blocks
  }
});
