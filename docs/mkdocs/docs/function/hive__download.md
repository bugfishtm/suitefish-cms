# Functions: `hive__download` 

## Function Overview

| Function                      | Description                                                                                                                        | Parameters                                         | Key Behaviors / Notes                                                                                                      |
|-------------------------------|------------------------------------------------------------------------------------------------------------------------------------|----------------------------------------------------|----------------------------------------------------------------------------------------------------------------------------|
| `hive__download_view`         | Streams a file to the browser for viewing or downloading, with support for HTTP range requests (partial content).                  | `$filePath` (string): Path to file$filenamex` (string/false): Optional override for download filename                    | - Sets headers for inline view (images, pdf, video) or download (other types)- Handles partial content (range requests)|
| `hive__download_force`        | Forces a file download (always as attachment), with support for HTTP range requests (partial content).                             | `$filePath` (string): Path to file$filenamex` (string/false): Optional override for download filename                    | - Always sets headers for download- Handles partial content (range requests)                                            |
| `hive__download_mimeTypes`    | Returns an array mapping file extensions to MIME types for use in download/view headers.                                           | None                                               | - Extendable array of MIME types- Used by both download/view functions                                                  |

## Function Details

### `hive__download_view($filePath, $filenamex = false)`
- **Purpose:**  
  Streams a file to the browser, displaying it inline for certain file types (images, pdf, video) or as a download for others.
- **Key Features:**  
  - Determines MIME type from file extension using `hive__download_mimeTypes()`.
  - Sets appropriate headers for inline or attachment disposition.
  - Supports HTTP range requests for partial downloads (useful for large files or media seeking).
  - Reads and outputs file in chunks (8MB) for performance.
  - Handles file not found and server errors gracefully.

### `hive__download_force($filePath, $filenamex = false)`
- **Purpose:**  
  Forces the browser to download the file as an attachment, regardless of file type.
- **Key Features:**  
  - Similar to `hive__download_view`, but always uses `Content-Disposition: attachment`.
  - Supports HTTP range requests and chunked output.
  - Handles file not found and server errors gracefully.

### `hive__download_mimeTypes()`
- **Purpose:**  
  Provides a mapping of file extensions to MIME types for use in download/view headers.
- **Key Features:**  
  - Easily extendable with new MIME types.
  - Used to set the correct `Content-Type` header in download/view functions.
