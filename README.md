# Article Summarizer

This Laravel application allows users to input a link to an article, fetches and scrapes the article content, summarizes it using OpenAI's GPT models, and displays the summary on the user interface.

## Table of Contents

- [Article Summarizer](#article-summarizer)
  - [Table of Contents](#table-of-contents)
  - [Requirements](#requirements)
  - [Installation](#installation)
  - [Configuration](#configuration)
  - [Usage](#usage)
  - [Contributing](#contributing)
  - [License](#license)

## Requirements

-   PHP 8.0 or higher
-   Composer
-   Laravel 11.x
-   An OpenAI API key

## Installation

1. **Clone the repository:**

    ```bash
    git clone https://github.com/Omar-Wael/article-summarizer.git
    cd article-summarizer
    ```

2. **Install dependencies:**

    ```bash
    composer install
    ```

3. **Set up your environment:**
   Copy the `.env.example` file to `.env`:

    ```bash
    cp .env.example .env
    ```

4. **Generate an application key:**
    ```bash
    php artisan key:generate
    ```

## Configuration

1. **Set your OpenAI API key:**

    ```bash
    OPENAI_API_KEY=your_openai_api_key
    ```

2. **Configure the CA certificate (for Windows users):**
   If you encounter SSL certificate issues, download the CA bundle from <a href="https://curl.se/docs/caextract.html">cURL's website</a> and set the `curl.cainfo` directive in your `php.ini` file:

    ```bash
    curl.cainfo="C:\path\to\cacert.pem"
    ```

## Usage

1. **Run the development server:**
    ```bash
    php artisan serve
    ```
2. **Access the application:**
   Open your web browser and go to http://localhost:8000.

3. **Summarize an article:**

- Enter the URL of the article you want to summarize in the input field.

- Click the "Summarize" button.
- The summary will be displayed below the input field.

## Contributing

Contributions are welcome! Please fork this repository and submit a pull request for any improvements or bug fixes.

## License

This project is licensed under the MIT license.
