# Suitefish CMS 

## 🔍 Overview

Suitefish-CMS is a powerful and versatile content management system designed to empower both end-users and developers alike. Whether you're a business owner looking to streamline your online presence or a developer seeking robust backend functionalities, Suitefish-CMS has you covered.

You can extend the CMS Functionality by adding Modules or extensions out of the internal store or by uploading them manually if you obtained them at our store.

## ⚙️ Installation

To deploy the Docker image `bugfishtm/suitefish:latest` using a single command, you can use the following:

```bash
docker run -d --restart always -p 80:80 -p 443:443 -e sf_db_pass=your_password -e sf_url=your_url -e sf_timezone=Europe/Berlin -v sys-ssl:/opt/sf_ssl -v sys-mysql:/var/lib/mysql -v cms-backup:/var/www/html/_backup -v cms-cache:/var/www/html/_cache -v cms-data:/var/www/html/_data -v cms-image:/var/www/html/_image -v cms-store:/var/www/html/_store -v cms-template:/var/www/html/_template  bugfishtm/suitefish:latest
```

This command does the following:

- Runs the container in detached mode (`-d`)
- Set the startup policy to start always (restart on reboot).
- Maps ports 80 and 443 from the container to the host.
- Sets required environment variables (`-e`)
	+ Caution: Replace the Variable Values with the values required for your instance. 
	+ You can find a table with all valid variables inside this readme.
- Creates and mounts volumes for persistent data (`-v`)
- Uses the `bugfishtm/suitefish:latest` image from Docker Hub

### Initial Login
Initial user account for the website after deployment:  
username: admin@admin.local  
password: changeme  

### Variables

|Variable|Description|
|-------|-------|
| sf_db_pass | MySQL root password for database to be created and used. |
| sf_url | Domain this service is running on. E.g http://localhost or https://localhost |
| sf_timezone | Timezone you want the service to run at. E.g Europe/Berlin. Use tz identifiers from https://en.wikipedia.org/wiki/List_of_tz_database_time_zones |

### Volumes

|Volume|Description| Path on Container |
|-------|-------|-------|
| sys-ssl | Stores persistent ssl data. | /opt/sf_ssl |
| sys-mysql | Stores persistent mysql database data. | /var/lib/mysql |
| cms-backup | Stores persistent backup data. | /var/www/html/_backup |
| cms-cache | Stores persistent cache data. | /var/www/html/_cache |
| cms-data | Stores persistent website data. | /var/www/html/_data |
| cms-image | Stores persistent image module data. | /var/www/html/_image |
| cms-store | Stores persistent store data. | /var/www/html/_store |
| cms-template | Stores persistent template data. | /var/www/html/_template |

### Ports

|Port|Description|
|-------|-------|
| 80 | Port for HTTP Connections to website. |
| 443 | Port for HTTPS Connections to website. |

### Useful Links

- [Github](https://github.com/bugfishtm/suitefish-cms)
- [Documentation](https://bugfishtm.github.io/suitefish-cms/)
- [Videos](https://www.youtube.com/playlist?list=PL6npOHuBGrpAfrpUzQPTOWdqoCnhq1oP0)

## 📖 Documentation

The following documentation is intended for both end-users and developers.


| **Description**                                                       | **Link**                                                                                         |
|----------------------------------------------------------------------|-------------------------------------------------------------------------------------------------|
| A playlist or video related to this project. | [https://www.youtube.com/playlist?list=PL6npOHuBGrpAfrpUzQPTOWdqoCnhq1oP0](https://www.youtube.com/playlist?list=PL6npOHuBGrpAfrpUzQPTOWdqoCnhq1oP0)|
| If this repository contains a _videos folder, you can check that as well. | |
| Access the online documentation for this project. | [https://bugfishtm.github.io/suitefish-cms/index.html](https://bugfishtm.github.io/suitefish-cms/index.html)  |

## ❓ Support Channels

If you encounter any issues or have questions while using this software, feel free to contact us:

- **GitHub Issues** is the main platform for reporting bugs, asking questions, or submitting feature requests: [https://github.com/bugfishtm/suitefish-cms/issues](https://github.com/bugfishtm/suitefish-cms/issues)
- **Discord Community** is available for live discussions, support, and connecting with other users: [Join us on Discord](https://discord.com/invite/y5d2px9KEw)  
- **Email support** is recommended only for urgent security-related issues: [security@bugfish.eu](mailto:security@bugfish.eu)

## 📢 Spread the Word

Help us grow by sharing this project with others! You can:  

* **Tweet about it** – Share your thoughts on [Twitter/X](https://twitter.com) and link us!  
* **Post on LinkedIn** – Let your professional network know about this project on [LinkedIn](https://www.linkedin.com).  
* **Share on Reddit** – Talk about it in relevant subreddits like [r/programming](https://www.reddit.com/r/programming/) or [r/opensource](https://www.reddit.com/r/opensource/).  
* **Tell Your Community** – Spread the word in Discord servers, Slack groups, and forums.  

## 🌱 Contributing to the Project

I am excited that you're considering contributing to our project! Here are some guidelines to help you get started.

**How to Contribute**

1. Fork the repository to create your own copy.
2. Create a new branch for your work (e.g., `feature/my-feature`).
3. Make your changes and ensure they work as expected.
4. Run tests to confirm everything is functioning correctly.
5. Commit your changes with a clear, concise message.
6. Push your branch to your forked repository.
7. Submit a pull request with a detailed description of your changes.
8. Reference any related issues or discussions in your pull request.

**Coding Style**

- Keep your code clean and well-organized.
- Add comments to explain complex logic or functions.
- Use meaningful and consistent variable and function names.
- Break down code into smaller, reusable functions and components.
- Follow proper indentation and formatting practices.
- Avoid code duplication by reusing existing functions or modules.
- Ensure your code is easily readable and maintainable by others.

## 🤝 Community Guidelines

We’re on a mission to create groundbreaking solutions, pushing the boundaries of technology. By being here, you’re an integral part of that journey. 

**Positive Guidelines:**
- Be kind, empathetic, and respectful in all interactions.
- Engage thoughtfully, offering constructive, solution-oriented feedback.
- Foster an environment of collaboration, support, and mutual respect.

**Unacceptable Behavior:**
- Harassment, hate speech, or offensive language.
- Personal attacks, discrimination, or any form of bullying.
- Sharing private or sensitive information without explicit consent.

Let’s collaborate, inspire one another, and build something extraordinary together!

## 🛡️ Warranty and Security

I take security seriously and appreciate responsible disclosure. If you discover a vulnerability, please follow these steps:

- **Do not** report it via public GitHub issues or discussions. Instead, please contact the [security@bugfish.eu](mailto:security@bugfish.eu) email address directly.   
- Provide as much detail as possible, including a description of the issue, steps to reproduce it, and its potential impact.  

I aim to acknowledge reports within **2–4 weeks** and will update you on our progress once the issue is verified and addressed.

This software is provided as-is, without any guarantees of security, reliability, or fitness for any particular purpose. We do not take responsibility for any damage, data loss, security breaches, or other issues that may arise from using this software. By using this software, you agree that We are not liable for any direct, indirect, incidental, or consequential damages. Use it at your own risk.

## 📜 License Information

The license for this software can be found in the [LICENSE.md](https://github.com/bugfishtm/suitefish-cms/blob/main/LICENSE.md) file.

🐟 Bugfish 
