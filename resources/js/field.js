import DetailField from './components/DetailField'
import FormField from './components/FormField'

Nova.booting((app, store) => {
  app.component('detail-quill-nova-field', DetailField)
  app.component('form-quill-nova-field', FormField)
})
