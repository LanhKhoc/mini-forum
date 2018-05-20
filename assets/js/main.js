// NOTE: Change this to match server
// Mixins
const Config = {
  host: 'localhost',
  port: '9999',
  rootREL: ''
};

// Blueprint / Functional Inheritance
const CkEditor = function() {
  const _files = [];

  const fileUpload = function(e) {
    console.log(this);
    _files.push(e.data.fileLoader.file);
    console.log(_files);
    e.stop();
  }

  return Object.assign(this, {
    files: _files,
    init() {
      CKEDITOR.replace('ckeditor', {
        height: '400px',
        image_previewText: ' ',
        // filebrowserBrowseUrl: '/browser/browse.php',
        // filebrowserImageUploadUrl: `http://${this.host}:${this.port}${this.rootREL}/?route=thread/image`
      });
    },
    handleFileUpload: fileUpload
  });
}

// NOTE: Delegate prototype
const Ajax = {
  create(Config) {
    return Object.assign(Object.create(Config), this);
  },

  serilizeObject(arr) {
    return arr.reduce((acc, cur) => {
      return {
        ...acc,
        [cur['name']]: cur['value']
      }
    }, {});
  },

  getRequest({ data, url }) {
    return new Promise((resolve, reject) => {
      $.ajax({
        url: url,
        method: 'GET',
        data: data,
        success: data => resolve(data),
        error: err => reject(err)
      })
    })
  }
};

$(() => {
  const ckEditorObj = CkEditor.call({...Config});
  ckEditorObj.init();
  const editor = CKEDITOR.instances.ckeditor;
  editor.on('fileUploadRequest', ckEditorObj.handleFileUpload);
})