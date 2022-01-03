/* eslint-disable no-tabs */
import React from 'react';
import PropTypes from 'prop-types';
import styled from 'styled-components';

const DescriptionComponent = styled.div`
	margin-top: 5px;
	text-align: left;
	font-size: 0.8em,
`;

const DescriptionComponentText = styled.span`
	font-weight: 300;
	font-size: 0.8em;
`;

const DescriptionComponentTextOptional = styled.span`
	font-style: italic;
	font-size: 0.8em;

	&::before {
		content: '- (';
		margin-left: 5px;
	}

	&::after {
		content: ')';
	}
`;

const Description = (props) => {
	const { text, optional } = props;

	return (
		<DescriptionComponent>
			<DescriptionComponentText className='text-description-component'>
				{text}
			</DescriptionComponentText>
			{optional ? (
				<DescriptionComponentTextOptional className='optional-description-component'>
					{optional}
				</DescriptionComponentTextOptional>
			) : null}
		</DescriptionComponent>
	);
};

Description.propTypes = {
	text: PropTypes.string.isRequired,
	optional: PropTypes.string,
};

Description.defaultProps = {
	optional: '',
};

export default Description;
