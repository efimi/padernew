export default {
	props: {
		endpoint: {
			type: String
		},
		sendAs: {
			type: String,
			default: 'file', // or 'image'
		}
	},
	data () {
		return {
			uploading: true
		}
	},
	methods: {
		upload(e) {
			this.uploading = true

			return axios.post(this.endpoint, this.packageUpload(e)).then((response) => {
				this.uploading = false

				return Promise.resolve(response)
			}).catch((error) => {
				this.uploading = false
				console.log(error.response)
				// return Promise.reject(error)
			})
		},
		packageUpload (e) {
			let fileData = new FormData();
			fileData.append( this.sendAs, e.target.files[0])
			return fileData
		}
	}
}