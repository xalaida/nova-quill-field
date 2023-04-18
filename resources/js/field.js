import DetailField from './components/DetailField'
import FormField from './components/FormField'

Nova.booting((app, store) => {
  app.component('detail-nova-quill-field', DetailField)
  app.component('form-nova-quill-field', FormField)
})
