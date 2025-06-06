-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 06, 2025 at 06:21 PM
-- Server version: 5.7.23-23
-- PHP Version: 8.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `metap8ok_bseriblog`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog_authors`
--

CREATE TABLE `blog_authors` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `bio` text,
  `profile_img` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blog_authors`
--

INSERT INTO `blog_authors` (`id`, `name`, `bio`, `profile_img`, `email`, `password`) VALUES
(1, 'Admin', 'Default administrator account', '', 'admin@bseri.net', 'Govind@bseri2025'),
(3, 'Govind Srinivasan', 'Govind Srinivasan is a CEO & Practice Manager @ Paramount Dataware | ISO Management System Standards Practitioner, Lead Auditor, & Lead Tutor', 'uploads/govind.jpg', 'govind@bseri.net', 'govind123');

-- --------------------------------------------------------

--
-- Table structure for table `blog_categories`
--

CREATE TABLE `blog_categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blog_categories`
--

INSERT INTO `blog_categories` (`id`, `name`, `slug`) VALUES
(1, 'Quality Management', 'quality-management'),
(2, 'Artificial Intelligence ', 'artificial-intelligence'),
(3, 'Information Security', 'information-security');

-- --------------------------------------------------------

--
-- Table structure for table `blog_posts`
--

CREATE TABLE `blog_posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `author_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `featured_img` varchar(255) DEFAULT NULL,
  `status` enum('draft','published','archived') DEFAULT 'draft'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blog_posts`
--

INSERT INTO `blog_posts` (`id`, `title`, `slug`, `content`, `category_id`, `author_id`, `created_at`, `updated_at`, `featured_img`, `status`) VALUES
(2, 'Nonconformities in ISO MSS Audit: A Precious Opportunity for Process Maturity Mgt', '-onconformities-in-udit-recious-pportunity-for-rocess-aturity-gt', '<p>Nonconformities, often perceived negatively, are in fact valuable opportunities for organizations to enhance their processes. Addressing nonconformities fosters deeper analytical thinking and encourages cross-functional collaboration for root cause analysis and corrective actions.</p>\r\n\r\n<p>In sectors like healthcare, manufacturing, aviation, BFSI, IT, and other process-driven industries, meticulous root cause analyses and corrective actions are crucial. Organizations should shift their mindset to view nonconformities not as blemishes but as catalysts for process maturity.</p>\r\n\r\n<p>Auditors highlight nonconformities not to assign blame but to provide organizations with the chance to reassess and improve their processes. Embracing these opportunities can lead to significant advancements in operational effectiveness and compliance.</p>\r\n', 1, 3, '2025-06-02 23:16:00', NULL, 'nonconformities-precious-opportunity-process-maturity.jpg', 'published'),
(3, 'Upcoming Artificial Intelligence ISO Standards in 2025: What to Expect', '-pcoming-rtificial-ntelligence-tandards-in-2025-hat-to-xpect', '<p>As artificial intelligence (AI) technologies evolve and integrate deeper into critical sectors, the need for standardized frameworks ensuring safety, transparency, and accountability becomes increasingly urgent. The International Organization for Standardization (ISO) and the International Electrotechnical Commission (IEC) are responding to this demand with a slate of AI-focused standards, several of which are scheduled for publication in 2025. These new standards aim to strengthen the governance, auditability, sustainability, and interpretability of AI systems across industries.</p>\r\n\r\n<ol>\r\n	<li>\r\n	<p><strong>ISO/IEC 5259-5 &ndash; Data Quality Governance Framework</strong><br />\r\n	This is the fifth installment of a six-part series focused on data quality for analytics and machine learning. While the first four parts&mdash;covering overview, data quality metrics, data provenance, and data quality management&mdash;have already been published, Part 5 introduces a structured governance framework. This framework will help organizations establish roles, responsibilities, and processes to ensure that data used in AI systems is accurate, consistent, and trustworthy throughout its lifecycle.</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>ISO/IEC DTS 6254 &ndash; Explainability and Interpretability in AI</strong><br />\r\n	This draft technical specification outlines objectives and methodologies for improving explainability and interpretability in machine learning models and AI systems. As black-box AI models pose challenges in high-stakes domains like healthcare, finance, and justice, this standard seeks to enable developers and stakeholders to build systems that are more transparent, comprehensible, and accountable.</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>ISO/IEC FDIS 12782 &ndash; Transparency Taxonomy for AI Systems</strong><br />\r\n	This forthcoming standard introduces a classification framework to help stakeholders understand different types and levels of transparency in AI systems. The taxonomy will aid developers, auditors, and regulators in evaluating the disclosure requirements necessary for different applications, based on context, risk, and stakeholder needs.</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>ISO/IEC DTR 20226 &ndash; Environmental Sustainability of AI</strong><br />\r\n	As AI systems grow in scale and power consumption, their environmental impact becomes a concern. This technical report focuses on the sustainability aspects of AI, guiding organizations on measuring and mitigating the ecological footprint of AI training, deployment, and maintenance.</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>ISO/IEC FDIS 42005 &ndash; AI System Impact Assessment</strong><br />\r\n	This standard provides a structured approach for assessing the impacts&mdash;both risks and benefits&mdash;of AI systems before and during deployment. It encourages proactive risk management and ethical considerations across the AI lifecycle.</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>ISO/IEC FDIS 42006 &ndash; Certification Bodies for AI Management Systems</strong><br />\r\n	This standard specifies the requirements for organizations that audit and certify AI management systems. It ensures that certification bodies operate with competence, consistency, and impartiality when evaluating compliance with AI governance and safety standards.</p>\r\n	</li>\r\n</ol>\r\n', 2, 3, '2024-12-17 00:22:06', NULL, 'uploads/1748884743_Using-Artificial-Intelligence-for-Environmental-Protection-and-Sustainable_BSERI-Blog.webp', 'published'),
(4, 'AI Literacy Implementation in EU Firms: A Reference for ISO 42001:2023 Compliance', '-iteracy-mplementation-in-irms-eference-for-42001-2023-ompliance', '<p>A recently published survey by the European Commission, titled <em>&quot;Living Repository of AI Literacy Practices&quot;</em> (version 31.01.2025), provides an insightful benchmark for organizations seeking to align with ISO/IEC 42001:2023 &mdash; the Artificial Intelligence Management System (AIMS) standard. While the survey is specific to firms within the EU, its relevance transcends geographies, especially for those working toward structured AI governance and competence development.</p>\r\n\r\n<p>This repository captures how selected EU-based companies, many of whom are AI Pact pledgers, are approaching the challenge of AI literacy dissemination within their operations. Importantly, these firms are not just striving to meet regulatory obligations under <strong>Article 4 of the EU AI Act</strong>&mdash;which mandates that AI system providers and deployers must implement AI literacy measures&mdash;but are also proactively building cross-functional AI competence aligned with international standards.</p>\r\n\r\n<p>The survey findings offer a valuable framework for firms implementing ISO 42001:2023, which requires robust competence and awareness mechanisms. Specifically, the document supports the following ISO 42001 clauses and Annex A controls:</p>\r\n\r\n<ul>\r\n	<li>\r\n	<p><strong>Clause 7.2 &ndash; Competence</strong>: Ensuring that individuals involved in the AI lifecycle possess the required knowledge and skills.</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Clause 7.3 &ndash; Awareness</strong>: Making stakeholders aware of the risks and responsibilities associated with AI.</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Annex A.4.6 &ndash; Human Resources</strong>: Developing and deploying AI-literate human capital.</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Annex A.5.4 &amp; A.5.5 &ndash; Impact Assessments</strong>: Understanding AI&rsquo;s effects on individuals and society.</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Annex A.8.2 &ndash; System Documentation</strong>: Providing understandable guidance for system users.</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Annex A.10.2 &ndash; Allocating Responsibilities</strong>: Ensuring accountability in AI operations.</p>\r\n	</li>\r\n</ul>\r\n\r\n<p>The repository categorizes participating firms into three groups based on their implementation status:</p>\r\n\r\n<ol>\r\n	<li>\r\n	<p><strong>Fully Implemented Practices</strong> &ndash; Organizations with operational AI literacy programs.</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Partially Rolled-Out Practices</strong> &ndash; Firms in active deployment stages.</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Planned Practices</strong> &ndash; Entities that have committed to AI literacy initiatives but are yet to operationalize them.</p>\r\n	</li>\r\n</ol>\r\n\r\n<p>Beyond compliance, this document functions as a <strong>practical guide for designing, benchmarking, and evolving AI education programs</strong>. It underscores that AI Pact pledges are voluntary and not legally binding, but they represent a genuine commitment to fostering responsible and informed AI use.</p>\r\n\r\n<p>For organizations outside the EU, especially those preparing for <strong>ISO 42001 certification</strong>, this repository serves as a living reference for cultivating an AI-competent workforce&mdash;firmly grounded in global best practices.</p>\r\n', 2, 3, '0000-00-00 00:00:00', NULL, 'uploads/1748884957_AI-Literacy.png', 'published'),
(7, 'EXPLANATORY NOTES TO DIGITAL PERSONAL DATA PROTECTION (DPDP) RULES, 2025 PUBLISHED BY THE GOVT OF INDIA', '2025', '<p>Find below the EXPLANATORY NOTES, attached.<br />\r\n<br />\r\nThis Explanatory Notes should get all the importance for us to form our views, based on what the Govt is contemplating to build as the compliance enforcement structure, related processes, and procedures.<br />\r\n<br />\r\nThis &quot;Notes&quot; was also published by the Govt., alongwith the publication of the Draft DPDP Rules, 2025.<br />\r\n<br />\r\nThe Govt&#39;s thoughts on the subject can further more be judged, by what Mr. Ashwini Vaishnaw, Union Minister has said on the subject, as published by the mainstream media.</p>\r\n', 1, 3, '2025-05-01 00:22:21', NULL, '', 'draft'),
(8, 'Understanding Data Leakage Prevention (DLeP) vs Data Loss Prevention (DLP) under ISO 27001:2022', 'nderstanding-ata-eakage-revention-e-vs-ata-oss-revention-under-27001-2022', '<h3><strong>Understanding Data Leakage Prevention (DLeP) vs Data Loss Prevention (DLP) under ISO 27001:2022</strong></h3>\r\n\r\n<p><strong>Clause A.8.12 of ISO 27001:2022</strong> introduces <em>Data Leakage Prevention</em> (DLeP) as a risk treatment control. While many in the IT and Infosec fields are familiar with <em>Data Loss Prevention</em> (DLP) software, the distinction between the two is crucial for effective implementation and cost consideration&mdash;especially for MSMEs.</p>\r\n\r\n<hr />\r\n<p><strong>What is Data Leakage Prevention (DLeP)?</strong></p>\r\n\r\n<p>DLeP focuses on preventing unintentional leaks of sensitive information through various low-level channels such as emails, USB devices, or unauthorized cloud syncs. It is often lightweight and addresses basic threats that arise from internal practices or oversights.</p>\r\n\r\n<hr />\r\n<p><strong>What is Data Loss Prevention (DLP)?</strong></p>\r\n\r\n<p>DLP systems offer broader capabilities such as real-time content inspection, endpoint protection, classification, and policy enforcement. These systems help prevent both accidental and malicious loss of data through more advanced mechanisms.</p>\r\n\r\n<hr />\r\n<p><strong>Why ISO Focuses on DLeP?</strong></p>\r\n\r\n<p>The ISO SC 27 Committee might have intentionally focused on DLeP in Clause A.8.12 instead of full-scale DLP to provide a more practical and cost-effective control that can be implemented by MSMEs. DLP solutions, while comprehensive, can be expensive and complex.</p>\r\n\r\n<hr />\r\n<p><strong>Key Distinctions Between DLP and DLeP</strong></p>\r\n\r\n<ul>\r\n	<li>\r\n	<p><strong>Scope</strong>:<br />\r\n	DLeP has a narrower focus, targeting common internal leakage scenarios. DLP covers both internal and external threats in a more systemic way.</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Cost</strong>:<br />\r\n	DLeP tools are more affordable, while enterprise-grade DLP systems demand higher investments.</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Implementation</strong>:<br />\r\n	DLeP can be implemented quickly and with minimal training. DLP requires configuration, maintenance, and skilled personnel.</p>\r\n	</li>\r\n</ul>\r\n\r\n<hr />\r\n<p><strong>Closing Thoughts</strong></p>\r\n\r\n<p>Infosec professionals, especially those working in or advising MSMEs, should understand the intent behind ISO&rsquo;s choice. While DLP systems are valuable, adopting DLeP-focused solutions aligned with ISO 27001:2022 offers a balanced approach between security and resource investment.</p>\r\n\r\n<p>This blog post is based on discussions supported by Gen AI tools like ChatGPT, which help clarify technical concepts. However, professionals are encouraged to verify and interpret such tools&#39; outputs for practical implementation.</p>\r\n', 3, 3, '2025-04-16 00:22:27', NULL, 'uploads/1748890166_Understanding-Data-Leakage-Prevention-Vs-Data-Loss-Prevention.jpg', 'published');

-- --------------------------------------------------------

--
-- Table structure for table `blog_post_tags`
--

CREATE TABLE `blog_post_tags` (
  `post_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blog_post_tags`
--

INSERT INTO `blog_post_tags` (`post_id`, `tag_id`) VALUES
(3, 1),
(4, 1),
(3, 2),
(4, 2),
(3, 3),
(4, 3),
(8, 3),
(3, 4),
(4, 4),
(3, 5),
(3, 6),
(3, 7),
(3, 8),
(3, 9),
(4, 9),
(3, 10),
(3, 11),
(3, 12),
(3, 13),
(3, 14),
(3, 15),
(4, 16),
(8, 16),
(4, 18),
(4, 19),
(4, 21),
(4, 23),
(4, 24),
(4, 25),
(4, 26),
(4, 27),
(4, 28),
(4, 29),
(4, 30),
(4, 32),
(4, 33),
(4, 35),
(8, 36),
(8, 37),
(8, 38),
(8, 40);

-- --------------------------------------------------------

--
-- Table structure for table `blog_tags`
--

CREATE TABLE `blog_tags` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `slug` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blog_tags`
--

INSERT INTO `blog_tags` (`id`, `name`, `slug`) VALUES
(1, 'ArtificialIntelligence', '-rtificial-ntelligence'),
(2, 'ISOStandards', '-tandards'),
(3, 'AICompliance', '-ompliance'),
(4, 'AIGovernance', '-overnance'),
(5, 'MachineLearning', '-achine-earning'),
(6, 'DataQuality', '-ata-uality'),
(7, 'ExplainableAI', '-xplainable-'),
(8, 'SustainableAI', '-ustainable-'),
(9, 'AIAudit', '-udit'),
(10, 'AITransparency', '-ransparency'),
(11, 'AIRegulation', '-egulation'),
(12, 'AIEthics', '-thics'),
(13, 'AIImpactAssessment', '-mpact-ssessment'),
(14, 'AIStandardization', '-tandardization'),
(15, 'AI2025', '-2025'),
(16, 'AI', '-'),
(18, 'ISO42001', '-42001'),
(19, 'AILiteracy', '-iteracy'),
(21, 'EULegislation', '-egislation'),
(23, 'AIEducation', '-ducation'),
(24, 'AIAwareness', '-wareness'),
(25, 'AICompetence', '-ompetence'),
(26, 'AIManagementSystem', '-anagement-ystem'),
(27, 'EUPolicy', '-olicy'),
(28, 'AIPact', '-act'),
(29, 'ResponsibleAI', '-esponsible-'),
(30, 'AIStrategy', '-trategy'),
(32, 'AIAssessment', '-ssessment'),
(33, 'AISustainability', '-ustainability'),
(35, 'EUAIAct', '-ct'),
(36, 'ISO 27001', '-27001'),
(37, 'Data Leakage Prevention', '-ata-eakage-revention'),
(38, 'Data Loss Prevention', '-ata-oss-revention'),
(40, 'Information Security', '-nformation-ecurity');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog_authors`
--
ALTER TABLE `blog_authors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `blog_categories`
--
ALTER TABLE `blog_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexes for table `blog_posts`
--
ALTER TABLE `blog_posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `author_id` (`author_id`);

--
-- Indexes for table `blog_post_tags`
--
ALTER TABLE `blog_post_tags`
  ADD PRIMARY KEY (`post_id`,`tag_id`),
  ADD KEY `tag_id` (`tag_id`);

--
-- Indexes for table `blog_tags`
--
ALTER TABLE `blog_tags`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog_authors`
--
ALTER TABLE `blog_authors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `blog_categories`
--
ALTER TABLE `blog_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `blog_posts`
--
ALTER TABLE `blog_posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `blog_tags`
--
ALTER TABLE `blog_tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blog_posts`
--
ALTER TABLE `blog_posts`
  ADD CONSTRAINT `blog_posts_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `blog_categories` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `blog_posts_ibfk_2` FOREIGN KEY (`author_id`) REFERENCES `blog_authors` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `blog_post_tags`
--
ALTER TABLE `blog_post_tags`
  ADD CONSTRAINT `blog_post_tags_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `blog_posts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `blog_post_tags_ibfk_2` FOREIGN KEY (`tag_id`) REFERENCES `blog_tags` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
