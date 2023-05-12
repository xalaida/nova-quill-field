<template>
  <DefaultField
    :field="field"
    :errors="errors"
    :show-help-text="showHelpText"
    :full-width-content="fullWidthContent"
  >
    <template #field>
      <div>
        <QuillEditor
          ref="editor"
          v-model:content="value"
          contentType="html"
          :theme="field.theme"
          :placeholder="placeholder"
          :read-only="isReadonly"
          :toolbar="field.toolbar"
          :options="field.options"
          @ready="ready"
        />
      </div>
    </template>
  </DefaultField>
</template>

<script>
import { FormField, HandlesValidationErrors, HandlesFieldAttachments } from 'laravel-nova'
import { QuillEditor } from '@vueup/vue-quill'
import '@vueup/vue-quill/dist/vue-quill.snow.css';
import '@vueup/vue-quill/dist/vue-quill.bubble.css'

export default {
  mixins: [
    FormField,
    HandlesValidationErrors,
    HandlesFieldAttachments
  ],

  components: {
    QuillEditor
  },

  props: [
    'resourceName',
    'resourceId',
    'field'
  ],

  methods: {
    fill(formData) {
        this.fillIfVisible(formData, this.fieldAttribute, this.value || '')

        this.fillAttachmentDraftId(formData)
    },

    quill () {
      return this.$refs.editor.getQuill()
    },

    ready () {
      if (this.field.withFiles) {
        this.quill().getModule('toolbar').addHandler('image', this.imageHandler)
      }
    },

    imageHandler () {
      this.browseImage()
    },

    browseImage () {
      const input = document.createElement('input');
      input.setAttribute('type', 'file');
      input.setAttribute('accept', 'image/*');
      input.onchange = () => {
        this.handleFileAdded(input.files[0])
      };
      input.click();
    },

    handleFileAdded (file) {
      const onCompleted = url => {
        const range = this.quill().getSelection(true);

        this.quill().insertEmbed(range.index, 'image', url);

        this.quill().setSelection(range.index + 1);
      }

      const onUploadProgress = progressEvent => {}

      this.uploadAttachment(file, {
          onCompleted,
          onUploadProgress
      })
    },
  }
}
</script>
